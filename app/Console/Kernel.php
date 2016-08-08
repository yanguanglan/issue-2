<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

#curl
function getJONP($url, $proxy_ip = null, $header = null)
{
    if (empty($url)) {
        return false;
    }
    // 初始化
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    // 启用时会将服务器服务器返回的“Location:”放在header中递归的返回给服务器
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // 设置 HTTP USERAGENT
    //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:5.0.1) Gecko/20100101 Firefox/5.0.1 FirePHP/0.5');
    // 设置curl允许执行的最长秒数
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, '5');
    curl_setopt($ch, CURLOPT_TIMEOUT, '10');
    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
    // 设置客户端是否支持 gzip压缩
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if($proxy_ip){
        curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    }
    if($header){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.94 Safari/537.36",
    ));
    $output = curl_exec($ch);
    curl_close($ch);
    if ($output === false) {
        return false;
    }
    return $output;
}

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            //清空库
            app('redis')->del('ips');
            //获取订单号
            $pools =  \App\Pool::where('status', 0)->get();

            foreach ($pools as $pool) {
                sleep(1);
                $ips = getJONP($pool->api);
                preg_match_all('/(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{1,5})/', $ips, $ip);

                if(isset($ip[1])&& count($ip[1])>1){
                    $result = count($ip[1]);
                    //插入集合
                    app('redis')->sadd('ips', $ip[1]);
                }else{
                    $result = $ips;
                }

                $log = [
                    'name'=> $pool->name,
                    'result'=> $result
                ];

                //日志
                \App\Log::create([
                    'log'=> json_encode($log)
                ]);

            }
            file_put_contents('log.ip.txt', date('Y-m-d H:i:s', time()));
        })->everyTenMinutes();   
    }
}
