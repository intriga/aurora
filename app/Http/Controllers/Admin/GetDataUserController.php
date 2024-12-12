<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetDataUserController extends Controller
{
    public static function getClientIp() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }        
        return $ipaddress;
    }

    public static function get_ip_type() {
        $ipaddress = self::getClientIp();
        if (filter_var($ipaddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return 'IPv4';
        } elseif (filter_var($ipaddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return 'IPv6';
        } else {
            return 'Invalid IP Address';
        }
    }

    public static function getUserOS() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];    
        $os_platform = "Unknown OS";   
        $os_array = [    
            '/windows nt 10/i'      => 'Windows 10',    
            '/windows nt 6.3/i'     => 'Windows 8.1',    
            '/windows nt 6.2/i'     => 'Windows 8',    
            '/windows nt 6.1/i'     => 'Windows 7',    
            '/windows nt 6.0/i'     => 'Windows Vista',    
            '/windows nt 5.2/i'     => 'Windows Server 2003/XP x64',    
            '/windows nt 5.1/i'     => 'Windows XP',    
            '/windows xp/i'         => 'Windows XP',    
            '/windows nt 5.0/i'     => 'Windows 2000',    
            '/windows me/i'         => 'Windows ME',    
            '/win98/i'              => 'Windows 98',    
            '/win95/i'              => 'Windows 95',    
            '/win16/i'              => 'Windows 3.11',    
            '/macintosh|mac os x/i' => 'Mac OS X',    
            '/mac_powerpc/i'        => 'Mac OS 9',    
            '/linux/i'              => 'Linux',    
            '/ubuntu/i'             => 'Ubuntu',    
            '/iphone/i'             => 'iPhone',    
            '/ipod/i'               => 'iPod',    
            '/ipad/i'               => 'iPad',    
            '/android/i'            => 'Android',    
            '/blackberry/i'         => 'BlackBerry',    
            '/webos/i'              => 'Mobile',    
            '/windows 11/i'         => 'Windows 11',    
            '/mac os 12/i'          => 'macOS Monterey',    
            '/mac os 13/i'          => 'macOS Ventura',    
            '/fedora/i'             => 'Fedora',    
            '/centos/i'             => 'CentOS',    
            '/debian/i'             => 'Debian',    
            '/solaris/i'            => 'Solaris',    
            '/chrome os/i'          => 'Chrome OS',    
        ];    
    
        foreach ($os_array as $regex => $value) {    
            if (preg_match($regex, $user_agent)) {    
                $os_platform = $value;    
            }    
        }   
    
        return $os_platform; 
    }

    public static function getUserAgent() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        return $userAgent;
    }

    public static function getUserBrowser() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // Check for common browsers
        if (preg_match('/Chrome\/([0-9.]+)/', $userAgent, $matches)) {
            $browser = 'Chrome';
            $version = $matches[1];
        } elseif (preg_match('/Firefox\/([0-9.]+)/', $userAgent, $matches)) {
            $browser = 'Firefox';
            $version = $matches[1];
        } elseif (preg_match('/Safari\/([0-9.]+)/', $userAgent, $matches)) {
            $browser = 'Safari';
            $version = $matches[1];
        } else {
            $browser = 'Unknown';
            $version = 'Unknown';
        }

        return $browser . " Version: " . $version;
    }

    public static function getUserLocation() {
        $ipaddress = $this->getClientIp();
        $url = "http://ipinfo.io/$ipaddress/json";
        //dd($url);
        $response = file_get_contents($url);
        $details = json_decode($response);

        // Access the location information
        $city = $details->city;
        $region = $details->region;
        $country = $details->country;

        return $city . " " . $region . " " . $country;
    }
    
}
