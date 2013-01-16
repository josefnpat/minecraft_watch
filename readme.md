## Minecraft Watch

#Requirements

To use this please ensure you have:
  * php5-cli
  * notify-send

#Configuration

First copy `config.sample.php` to `config.php`.

Change the `SERVERLOG` define to your server.log location. Keep in mind, you
may not use `~` in PHP5. You may also define it as a remote address, as it
simply uses the `file_get_contents()` function.

Change the `DELTATIME` define to how many milliseconds you want the script to
wait before polling the server.log again. This is very important for remote
server configurations, as it could be rather strenuous otherwise.

#Execution

Then `chmod a+x watch.php` and run it `./watch.php` or fork it with nohup:
`nohup ./watch.php &`.

#Thanks

Icons courtesy www.minecraftwiki.net

Thanks VividReality for testing and conception