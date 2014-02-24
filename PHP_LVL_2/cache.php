<?php

header('Cache-Control: no-cache');//clear cache after browser closeing only!!

header('Cache-Control: no-store; max-age=0');//clear cache after redirect to new page

header('Cache-Control: max-age=3600');//once the content is stale (older than 3600 seconds) must revalidate  the origin server before  serve the content.
