<?php

// How long to wait to poll the log in milliseconds.
// For local files; ~100ms is good.
// For remote servers, you ~1000ms is good.
define("DELTATIME",1000);

// The location of the server log.
// Relative Example
define("SERVERLOG","../server.log");
// Remote Example
//define("SERVERLOG","http://foo.com/server.log");
