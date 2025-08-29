<?php
// Prefer env TZ if set on Azure App Service (Linux); fallback to Asia/Tbilisi
$tz = getenv('TZ') ?: 'Asia/Tbilisi';
date_default_timezone_set($tz);
$now = new DateTime();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Matrix Hello</title>
  <!-- Auto-refresh every 5s so you see the clock tick -->
  <meta http-equiv="refresh" content="5" />
  <style>
    :root { --fg:#00ff88; }
    * { box-sizing: border-box; }
    body {
      margin: 0; min-height: 100vh;
      display: grid; place-items: center;
      background: #000; color: var(--fg);
      font-family: Consolas, Monaco, "Courier New", monospace;
    }
    .card {
      padding: 2rem 3rem;
      border: 1px solid rgba(0,255,120,.35);
      border-radius: 14px;
      box-shadow: 0 0 30px rgba(0,255,120,.25), inset 0 0 20px rgba(0,255,120,.15);
    }
    h1 {
      margin: 0 0 .5rem;
      letter-spacing: .06em;
      text-shadow: 0 0 8px rgba(0,255,120,.65);
    }
    .blink { animation: blink 1s steps(2,end) infinite; }
    @keyframes blink { to { visibility: hidden; } }
    .meta { margin-top: .75rem; opacity: .85; font-size: .95rem; }
    kbd { background: rgba(0,255,120,.1); border: 1px solid rgba(0,255,120,.35);
          padding: .15rem .4rem; border-radius: 6px; }
  </style>
</head>
<body>
  <main class="card">
    <h1>🟢 Hello from <strong>Matrix</strong> … <span class="blink">_</span></h1>
    <p>⏱️ Local time (<?php echo htmlspecialchars($tz); ?>): <strong><?php echo $now->format('Y-m-d H:i:s T'); ?></strong></p>
    <p class="meta">
      Host: <kbd><?php echo gethostname(); ?></kbd> •
      PHP: <kbd><?php echo PHP_VERSION; ?></kbd>
    </p>
  </main>
</body>
</html>
