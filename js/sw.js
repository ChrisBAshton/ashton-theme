self.addEventListener('install', function (event) {
  console.log("sw.js install callback");
});

// @TODO - read manifest from cache to decide which requests to intercept
// let manifest = false;
// const getManifest = async () => {
//   if (manifest) {
//     return manifest;
//   }
//   const originalManifest = await fetchFromCache("manifest");
//   originalManifest.map()
// }
// getManifest();

self.addEventListener('fetch', function (event) {
  // event.waitUntil(getManifest());
  event.respondWith(async function () {
    const cachedValue = await fetchFromCache(event.request.url);
    if (cachedValue) {
      console.log(`Using cached value for ${event.request.url}`);
      return new Response(
        cachedValue,
        {
          "status": 200,
          "statusText": "OK",
          "headers": {
            "Content-Type": "text/css; charset=utf-8",
          }
        },
      );
    }
    else {
      return fetch(event.request);
    }
  }());
});

const fetchFromCache = url => {
  return new Promise((resolve, reject) => {
    caches.open("inline-cache").then(cache => {
      cache.match(url).then(async response => {
        if (response) {
          const styles = await responseBodyToString(response.body);
          resolve(styles);
        }
        else {
          resolve(false);
        }
      });
    });
  });
}

const responseBodyToString = async (responseBody) => {
  return new Promise((resolve, reject) => {
    if (!responseBody) { reject() };
    let result = '';
    const decoder = new TextDecoder("utf-8");
    const reader = responseBody.getReader();
    reader.read().then(function processText({ done, value }) {
      if (done) {
        resolve(result);
        return;
      }  
      result += decoder.decode(value);
      return reader.read().then(processText);
    })
  });
}
