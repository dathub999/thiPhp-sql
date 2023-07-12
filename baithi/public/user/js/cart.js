window.HaravanAnalytics.fb = "724422456050674";
//<![CDATA[
! function (f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function () {
        n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
}(window,
    document, 'script', '//connect.facebook.net/en_US/fbevents.js');
// Insert Your Facebook Pixel ID below. 
fbq('init', window.HaravanAnalytics.fb, {}, {
    'agent': 'plharavan'
});
fbq('track', 'PageView');
window.HaravanAnalytics.ga4 = "G-MKZG6K6S3D";
window.HaravanAnalytics.enhancedEcommercev4 = true;
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'G-MKZG6K6S3D');