<?php

namespace {
    class SteamSDK
    {
        
        
    }
    class Config
    {
        protected const _KEY = 'STEAM_API_KEY';
        protected const _API = 'http://api.steampowered.com/%s/%s/%s';
        protected const _FORMAT = 'json';
        
        public static function getQuery($a)
        {
            $a['key']    = self::_KEY;
            $a['format'] = self::_FORMAT;
            return '/?' . http_build_query($a);
        }
        
        public static function getURL($interface, $method, $version, $data)
        {
            $url = sprintf(self::_API, $interface, $method, $version, self::_KEY);
            $url .= self::getQuery($data);
            return $url;
        }
        
        public static function request($url)
        {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $resp;
            try {
                $resp = json_decode(curl_exec($curl), true);
            }
            catch (\Exception $ex) {
                throw new \Exception($ex);
            }
            curl_close($curl);
            return $resp;
        }
        
    }
}


namespace SteamSDK {
    
    class ISteamNews
    {
        
        protected const NAME = "ISteamNews";
        
        public static function GetNewsForApp($appID, $count = 5, $maxLength = 25)
        {
            return \Config::request(\Config::getURL(self::NAME, 'GetNewsForApp', 'v0002', array(
                'appid' => $appID,
                'count' => $count,
                'maxLength' => $maxLength
            )));
        }

    }
    
    class ISteamUserStats
    {
		
		protected const NAME = 'ISteamUserStats';
		
        public static function getGlobalStatsForGame($appID, $count = 5)
        {
            
        }
		
        public static function getGlobalAchievementPercentagesForApp($appID)
        {
            return \Config::request(\Config::getURL(self::NAME, 'GetGlobalAchievementPercentagesForApp', 'v0002', array(
                'gameid' => $appID
            )));
        }
		
    }
    
    class ISteamUser
    {
		protected const NAME = 'ISteamUser';
		
        public static function getPlayerSummaries($steamid)
        {
            return \Config::request(\Config::getURL(self::NAME, 'GetPlayerSummaries', 'v0002', array(
                'steamids' => $steamid
            )));
        }
    }
    
    
}
