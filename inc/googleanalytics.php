<?php
function add_google_analytics() {
?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-xxxxxxxxx-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-xxxxxxxxx-1', { 'anonymize_ip': true });
  </script>
<?php
}
add_action('wp_head', 'add_google_analytics',99);