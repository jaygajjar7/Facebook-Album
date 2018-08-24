# Facebook-Album

#Part-1: Album Slideshow

User visits your script page
User will be asked to connect using his FB account
Once authenticated, your script will pull his album list from FB
User will click on an album name/thumbnail
A pure CSS and Plain JS slideshow will start showing photos in that album (in full-screen mode)

#Part-2: Download Album

Beside every album icon (step #4 in part-1), add a new icon/button saying “Download This Album”
When the user clicks on that button, your script will fetch all photos in that album behind the scene and zip them inside a folder on server.
You may start a “progress bar” as soon as user-click download button as download process may take time.
Once zip building on server completes, show user link to zip file.
When user clicks zip-file link, it will download zip folder without opening any new page.
Beside album names, add a checkbox. Then add a common “Download Selected Album” button. This button will download selected albums into a common zip that will contain one folder for each album. Folder-name will be album-name.
Also, add a big “Download All” button. This button will download all albums in a zip, similar to above.