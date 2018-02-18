# SteamSDK-PHP

SteamSDK for [Steam API Development](http://steamcommunity.com/dev)

### Installation

Include ```SteamSDK.php```, and add this to the header of your php file.

```php
use \SteamSDK\ISteamNews as ISteamNews;
use \SteamSDK\ISteamUserStats as ISteamUserStats;
use \SteamSDK\ISteamUser as ISteamUser;
use \SteamSDK\IPlayerService as IPlayerService;
```

Inside of ```SteamSDK.php``` locate the ```Config``` class, find ```STEAM_API_KEY``` and replace it with your steam key found [here](http://steamcommunity.com/dev/apikey)

> #### SteamSDK\ISteamNews

```php
ISteamNews::getNewsForApp(APP_ID, COUNT, MAX_LENGTH);
```

> #### SteamSDK\ISteamUserStats

```php
ISteamUserStats::getGlobalAchievementPercentageForApp(APP_ID);
```

```php
ISteamUserStats::getPlayerAchievements(STEAM_ID, APP_ID, LANG);
```

```php
ISteamUserStats::getUserStatsForGame(STEAM_ID, APP_ID);
```

```php
ISteamUserStats::getSchemaForGame(APP_ID);
```

```php
ISteamUserStats::getPlayerBans(STEAM_ID);
```

> #### SteamSDK\ISteamUser

```php
ISteamUser::getPlayerSummaries(STEAM_ID);
```

```php
ISteamUser::getFriendList(STEAM_ID);
```

> #### SteamSDK\IPlayerService

```php
IPlayerService::getOwnedGames(STEAM_ID);
```

```php
IPlayerService::getRecentlyPlayedGames(STEAM_ID, COUNT);
```

```php
IPlayerService::isPlayingSharedGame(STEAM_ID, APP_ID);
```


> Feel free to submit PR's of updates, additions or changes.
