<?php


namespace SteamSDK {
    
    class Config
    {
        protected const _KEY = 'STEAM_API_KEY';
        protected const _API = 'http://api.steampowered.com/%s/%s/%s/';
        protected const _FORMAT = 'json';
        
        public static function getQuery($a)
        {
            $a['key']    = self::_KEY;
            $a['format'] = self::_FORMAT;
            return '?' . http_build_query($a);
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
    
    class ISteamNews
    {
        
        protected const NAME = "ISteamNews";
        
        public static function getNewsForApp($appID, $count = 5, $maxLength = 25)
        {
            return Config::request(Config::getURL(self::NAME, 'GetNewsForApp', 'v0002', array(
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
            return Config::request(Config::getURL(self::NAME, 'GetGlobalAchievementPercentagesForApp', 'v0002', array(
                'gameid' => $appID
            )));
        }
        
        public static function getPlayerAchievements($steamid, $appid, $lang = 'en')
        {
            return Config::request(Config::getURL(self::NAME, 'GetPlayerAchievements', 'v0001', array(
                'steamid' => $steamid,
                'appid' => $appid,
                'language' => $lang
            )));
        }
        
        public static function getUserStatsForGame($steamid, $appid)
        {
            return Config::request(Config::getURL(self::NAME, 'GetUserStatsForGame', 'v0002', array(
                'steamid' => $steamid,
                'appid' => $appid
            )));
        }
        
        public static function getSchemaForGame($appid)
        {
            return Config::request(Config::getURL(self::NAME, 'GetSchemaForGame', 'v2', array(
                'appid' => $appid
            )));
        }
        
        public static function getPlayerBans($steamid)
        {
            return Config::request(Config::getURL(self::NAME, 'GetPlayerBans', 'v1', array(
                'steamid' => $steamid
            )));
        }
        
    }
    
    class ISteamUser
    {
        protected const NAME = 'ISteamUser';
        
        public static function getPlayerSummaries($steamid)
        {
            return Config::request(Config::getURL(self::NAME, 'GetPlayerSummaries', 'v0002', array(
                'steamids' => $steamid
            )));
        }
        
        public static function getFriendList($steamid, $relationship = 'friend')
        {
            return Config::request(Config::getURL(self::NAME, 'GetFriendList', 'v0001', array(
                'steamid' => $steamid,
                'relationship' => $relationship
            )));
        }
        
        
        
    }
    
    class IPlayerService
    {
        
        protected const NAME = 'IPlayerService';
        
        public static function getOwnedGames($steamid, $include_info = true, $include_free_games = false)
        {
            return Config::request(Config::getURL(self::NAME, 'GetOwnedGames', 'v0001', array(
                'steamid' => $steamid,
                'include_appinfo' => $include_info,
                'include_played_free_games' => $include_free_games
            )));
        }
        
        public static function getRecentlyPlayedGames($steamid, $count = 5)
        {
            return Config::request(Config::getURL(self::NAME, 'GetRecentlyPlayedGames', 'v0001', array(
                'steamid' => $steamid,
                'count' => $count
            )));
        }
        
        public static function isPlayingSharedGame($steamid, $appid)
        {
            return Config::request(Config::getURL(self::NAME, 'IsPlayingSharedGame', 'v0001', array(
                'steamid' => $steamid,
                'appid_playing' => $appid
            )));
        }
        
        
    }
    
}
