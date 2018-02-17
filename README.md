# SteamSDK-PHP

SteamSDK for [Steam API Development](http://steamcommunity.com/dev)

> ###### namespace SteamSDK\ISteamNews
- ```ISteamNews::getNewsForApp(APP_ID, COUNT, MAX_LENGTH);```

> ###### namespace SteamSDK\ISteamUserStats
- ```ISteamUserStats::getGlobalAchievementPercentageForApp(APP_ID);```
- ```ISteamUserStats::getPlayerAchievements(STEAM_ID, APP_ID, LANG);```
- ```ISteamUserStats::getUserStatsForGame(STEAM_ID, APP_ID);```
- ```ISteamUserStats::getSchemaForGame(APP_ID);```
- ```ISteamUserStats::getPlayerBans(STEAM_ID);```

> ###### namespace SteamSDK\ISteamUser
- ```ISteamUser::getPlayeerSummaries(STEAM_ID);```
- ```ISteamUser::getFriendList(STEAM_ID, RELATIONSHIP (friend, all));```

> ###### namespace SteamSDK\IPlayerService
- ```IPlayerService::getOwnedGames(STEAM_ID);```
- ```IPlayerService::getRecentlyPlayedGames(STEAM_ID, COUNT);```
- ```IPlayerService::isPlayingSharedGame(STEAM_ID, APP_ID);```

#### Installation

Include ```SteamSDK.php``, and add this to the header of your php file.

```
use \SteamSDK\ISteamNews as ISteamNews;
use \SteamSDK\ISteamUserStats as ISteamUserStats;
use \SteamSDK\ISteamUser as ISteamUser;
use \SteamSDK\IPlayerServie as IPlayerService;
```

Inside of ```SteamSDK.php``` locate the ```Config``` class, find ```STEAM_API_KEY``` and replace it with your steam key found [here](http://steamcommunity.com/dev/apikey)
