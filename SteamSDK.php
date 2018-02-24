<?php


namespace SteamSDK {
    
    class Config
    {
        protected const _KEY = 'STEAM_API_KEY';
        protected const _API = 'http://api.steampowered.com/%s/%s/%s/';
        protected const _FORMAT = 'json';
        
        private static function getQuery($a)
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
                curl_close($curl);
                throw new \Exception($ex);
            }
            curl_close($curl);
            return $resp;
        }
        
    }
    
    class ISteamNews
    {
        
        public static function getNewsForApp($appID, $count = 5, $maxLength = 25)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetNewsForApp', 'v0002', array(
                'appid' => $appID,
                'count' => $count,
                'maxLength' => $maxLength
            )));
        }
        
    }
    
    class ISteamUserStats
    {
        
        public static function getGlobalStatsForGame($appID, $count = 5, $name = array(), $startdate = null, $enddate = null)
        {
            $data = array('appid'=>$appID, 'count'=>$count);
            if($startdate != null && $enddate != null) {
                $data['startdate'] = $startdate;
                $data['enddate'] = $enddate;
            }
            foreach($name as $n => $v)  $data['name['.$n.']'] = $v;
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetGlobalStatsForGame', 'v0002', $data));
        }
        
        public static function getGlobalAchievementPercentagesForApp($appID)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetGlobalAchievementPercentagesForApp', 'v0002', array(
                'gameid' => $appID
            )));
        }
        
        public static function getPlayerAchievements($steamid, $appid, $lang = 'english')
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetPlayerAchievements', 'v0001', array(
                'steamid' => $steamid,
                'appid' => $appid,
                'language' => $lang
            )));
        }
        
        public static function getUserStatsForGame($steamid, $appid)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetUserStatsForGame', 'v0002', array(
                'steamid' => $steamid,
                'appid' => $appid
            )));
        }
        
        public static function getSchemaForGame($appid)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetSchemaForGame', 'v2', array(
                'appid' => $appid
            )));
        }
        
        public static function getPlayerBans($steamid)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetPlayerBans', 'v1', array(
                'steamid' => $steamid
            )));
        }
        
    }
    
    class ISteamUser
    {

        public static function getPlayerSummaries($steamid)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetPlayerSummaries', 'v0002', array(
                'steamids' => $steamid
            )));
        }
        
        public static function getFriendList($steamid, $relationship = 'friend')
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetFriendList', 'v0001', array(
                'steamid' => $steamid,
                'relationship' => $relationship
            )));
        }
        
    }
    
    class IPlayerService
    {
        
        public static function getOwnedGames($steamid, $include_info = true, $include_free_games = false)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetOwnedGames', 'v0001', array(
                'steamid' => $steamid,
                'include_appinfo' => $include_info,
                'include_played_free_games' => $include_free_games
            )));
        }
        
        public static function getRecentlyPlayedGames($steamid, $count = 5)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'GetRecentlyPlayedGames', 'v0001', array(
                'steamid' => $steamid,
                'count' => $count
            )));
        }
        
        public static function isPlayingSharedGame($steamid, $appid)
        {
            return Config::request(Config::getURL(substr(__CLASS__, 9), 'IsPlayingSharedGame', 'v0001', array(
                'steamid' => $steamid,
                'appid_playing' => $appid
            )));
        }
        
    }
}
