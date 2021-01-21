(function () {
  var cutsTheMustard = "serviceWorker" in navigator;
  if (!cutsTheMustard) {
    console.log("inline-cache is not supported by this browser.");
    return;
  }

  // Set up service worker. It MUST live at the root to be able to intercept all requests.
  navigator.serviceWorker.register("/inline-cache-sw.js").then(function (reg) {
    if(reg.installing) {
      console.log('Service worker installing');
    } else if(reg.waiting) {
      console.log('Service worker installed');
    } else if(reg.active) {
      console.log('Service worker active');
    }
  }).catch(function(error) {
    // registration failed
    console.log('Registration failed with ' + error);
  });

  window.addEventListener('DOMContentLoaded', function (event) {
    // Detect resources in the page marked for inline caching
    // @TODO - only run this step if service worker successfully installs
    var stylesheetsToCache = [];
    Array.from(document.getElementsByTagName("style")).forEach(function (stylesheet) {
      if (stylesheet.getAttribute("data-src") && stylesheet.getAttribute("data-inline-cache")) {
        console.log("Found a stylesheet to cache", stylesheet);
        stylesheetsToCache.push({
          url: stylesheet.getAttribute("data-src"),
          hash: stylesheet.getAttribute("data-inline-cache"), // @TODO - we need to invalidate when this changes, with `<link rel="stylesheet" data-inline-cache="different-value"...`
          value: stylesheet.innerText.trim(),
        });
      }
    });

    if (stylesheetsToCache.length > 0) {
      caches.open("inline-cache").then(function (cache) {
        stylesheetsToCache.forEach(function (stylesheet) {
          console.log("Saving stylesheet in cache...", stylesheet);
          cache.put(stylesheet.url, new Response(
            stylesheet.value,
            {
              "status": 200,
              "statusText": "OK",
              "headers": {
                "Content-Type":"text/css; charset=utf-8",
              },
            },
          ));
        });
      });

      // caches.open("inline-cache").then(function (cache) {
      //   // @TODO - retrieve manifest and merge latest cache values into it
      //   cache.match("manifest").then(async response => {
      //     if (response) {
      //       const styles = await responseBodyToString(response.body);
      //       resolve(styles);
      //     }
      //     else {
      //       resolve(false);
      //     }
      //   });
      //   cache.put("manifest", stylesheetsToCache.map(function(stylesheet) {
      //     return stylesheet.url
      //   }));
      // });

      function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
      }

      var cookie = JSON.parse(getCookie("inline-cacher") || "{}");
      stylesheetsToCache.forEach(function(stylesheet) {
        cookie[stylesheet.url] = stylesheet.hash;
      });
      document.cookie = "inline-cacher=" + JSON.stringify(cookie);
    }
    else {
      console.log("No fresh resources to cache.");
    }
  });
})();