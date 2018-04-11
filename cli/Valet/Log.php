<?php

namespace Valet;

class Log
{
    var $cli;
    var $files;

    const LOG_PATHS = [
        '/usr/local/var/log',
        '~/.valet/Log/'
    ];

    /**
     * Create a new Nginx instance.
     *
     * @param  CommandLine $cli
     * @param  Filesystem $files
     * @param  Site $site
     */
    function __construct(CommandLine $cli, Filesystem $files)
    {
        $this->cli = $cli;
        $this->files = $files;
    }

    function log($logname){
        $logPaths = [
            '/usr/local/var/log',
            getenv("HOME") . '/.valet/Log/'
        ];

        $logs = $this->scanDirectory($logPaths);

        if(isset($logs[$logname.'.log'])){
            $this->cli->passthru('cat '.$logs[$logname.'.log']);
        }else{
            info('Log not found! Logs available:');
            foreach (array_keys($logs) as $log){
                info('- '.$log);
            }
        }
    }

    private function scanDirectory($logPaths){
        $logs = [];

        foreach($logPaths as $basePath){
            $files = $this->files->scandir($this->files->realpath($basePath));
            foreach($files as $file){
                $filePath = $basePath.'/'.$file;
//                info('scanning file:' . $filePath); // Debug line
                if($this->endsWith($file, '.log')){
                    $logs[$file] = $filePath;
//                    info('Found log at: ' . $filePath); // Debug line
                }
            }
        }

        return $logs;
    }

    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);

        return $length === 0 ||
            (substr($haystack, -$length) === $needle);
    }
}