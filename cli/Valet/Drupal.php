<?php

namespace Valet;

class Drupal
{
    var $cli;
    var $files;
    const NGINX_CONF = '/usr/local/etc/nginx/nginx.conf';

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

    function unlock($file){
        $currentPath = getcwd();
        info('Scanning sub directories!');
        $path = $this->scanDirectory($currentPath);

        info('Unlocking drupal sites directory!');
        $this->unlockFiles($path, $file);
    }

    private function scanDirectory($basePath){
        $path = null;

        $files = $this->files->scandir($basePath);
        foreach($files as $file){
            $filePath = $basePath.'/'.$file;
//            info('scanning file:' . $filePath); // Debug line
            if($file === 'sites' && $this->files->isDir($filePath)){
                $path = $basePath.'/'.$file;
                info('Found sites directory at: '.$path);
                break;
            }else if ($this->files->isDir($filePath) && $file !== 'core'){
                $tempBasePath = $basePath.'/'.$file;
                $path = $this->scanDirectory($tempBasePath);
                if($path !== null){
                    break;
                }
            }
        }

        return $path;
    }

    private function unlockFiles($basePath, $unlockDir){
        $path = null;

        $files = $this->files->scandir($basePath);
        foreach($files as $file){
            $filePath = $basePath.'/'.$file;
//            info('scanning file:' . $filePath); // Debug line
            if($file === $unlockDir){
                info('unlocking file: '.$filePath);
                $this->files->chmod($filePath, 0700);
            }else if ($this->files->isDir($filePath) && $file !== 'core'){
                $tempBasePath = $basePath.'/'.$file;
                $path = $this->unlockFiles($tempBasePath, $unlockDir);
                if($path !== null){
                    break;
                }
            }
        }

        return $path;
    }


}