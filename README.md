
# :camera: Facebook-Album :camera: 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jaygajjar7/Facebook-Album/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jaygajjar7/Facebook-Album/?branch=master) <br>
An application for fetching,viewing and downloading Facebook Albums of a logged in user. 

## :video_game:Demo Application

:point_right: (https://assembled.000webhostapp.com/) <br>

##  Features:exclamation:

 **1. Album Slideshow** <br>
:heavy_check_mark: User visits your script page <br>
:heavy_check_mark: User will be asked to connect using his FB account <br>
:heavy_check_mark: Once you authenticated, your script will pull his album list from FB <br>
:heavy_check_mark: User will click on an album name/thumbnail <br>
:heavy_check_mark: slideshow will start showing photos in that album (:metal:in full-screen mode:metal:) <br>

 **2. Download Album**

:heavy_check_mark: Beside every album icon , add a new icon/button saying “Download This Album” <br>
:heavy_check_mark: When the user clicks on that button, your script will fetch all photos in that album behind the scene and zip them inside a folder on server. <br>
:heavy_check_mark: You may start a “progress bar” as soon as user-click download button as download process may take time. <br>
Once zip building on server completes, show user link to zip file. <br>
:heavy_check_mark: When user clicks zip-file link, it will download zip folder without opening any new page. <br>
:heavy_check_mark: Beside album names, add a checkbox. Then add a common “Download Selected Album” button. This button will download selected albums into a common zip that will contain one folder for each album. Folder-name will be album-name. <br>
:heavy_check_mark: Also, add a big “Download All” button. This button will download all albums in a zip, similar to above. <br>

##  :alien:Technology

Technology which are used to develop the web-app

-   **[HTML]** - HTML enhanced for web apps!
-   **[Php]** - Php is used for the back-end
-   **[Bootstrap]** - Bootstrap is used to design the web pages
-   **[Jquery]** - jquery is used to increase the efficiency:zap:

## :triangular_flag_on_post:Prerequisites

:one: Create an Application [Facebook For Developer](https://developers.facebook.com/) <br>
    -   Copy your credentials and paste it to the **Config.php**  
```
$fb = new \Facebook\Facebook([
        'app_id' => 'Your App Id',
        'app_secret' => 'Your App Secret',
        'default_graph_version' => 'v3.1'
    ]);
```

## :telescope:Installation
Download and install the [Composer](https://getcomposer.org/download/)

To install the php library. Go to library folder and run the below command

```
#this command install Facebook Graph Sdk
composer require facebook/graph-sdk

#this command install Lightbox
`bower install ekko-lightbox --save`
Or, download the files directly:(https://github.com/ashleydw/lightbox/tree/master/dist)
 ```

## :nut_and_bolt:Plugins
|  Plugin|Readme  |
|--|--|
| Facebook | https://github.com/facebook/php-graph-sdk  |
| Lightbox| http://ashleydw.github.io/lightbox/ |
| Bootstrap| https://getbootstrap.com/ |

