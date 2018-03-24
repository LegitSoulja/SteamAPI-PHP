# SteamAPI-PHP

SteamAPI for [Steam API Development](http://steamcommunity.com/dev)

### Installation

Include ```SteamAPI.php```, and add this to the header of your php file.

```php
include 'SteamAPI.php';

use \SteamAPI\ISteamNews as ISteamNews;
use \SteamAPI\ISteamUserStats as ISteamUserStats;
use \SteamAPI\ISteamUser as ISteamUser;
use \SteamAPI\IPlayerService as IPlayerService;
```

Inside of ```SteamAPI.php``` locate the ```Config``` class, find ```STEAM_API_KEY``` and replace it with your steam key found [here](http://steamcommunity.com/dev/apikey)

> #### SteamAPI\ISteamNews

```php
ISteamNews::getNewsForApp(APP_ID, COUNT, MAX_LENGTH);
```

> #### SteamAPI\ISteamUserStats

```php
ISteamUserStats::getGlobalStatsForGame(APP_ID, COUNT, NAMES[], STARTDATE(optional), ENDDATE(optional))
```

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

> #### SteamAPI\ISteamUser

```php
ISteamUser::getPlayerSummaries(STEAM_ID);
```

```php
ISteamUser::getFriendList(STEAM_ID);
```

> #### SteamAPI\IPlayerService

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
