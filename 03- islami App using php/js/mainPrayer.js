// Prayer Time Section
let prayerTime = document.querySelectorAll(
  ".container .flex-container-prayer .item2 .div2  .flex-container__pray .item2-pray"
);
// console.log(prayerTime);
let islamicDate = document.querySelector(".islamic-date");
const buttonPrayer = document.querySelector(".getprayer");
// console.log(buttonPrayer);

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  const lat = position.coords.latitude;
  const lng = position.coords.longitude;
  const nominatimUrl = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;

  fetch(nominatimUrl)
    .then((response) => response.json())
    .then((data) => {
      const city =
        data.address.city ||
        data.address.town ||
        data.address.village ||
        data.address.hamlet ||
        data.address.suburb;
      const country = data.address.country;
      prayerApi(
        `https://api.aladhan.com/v1/timingsByCity?city=${city}&country=${country}&method=8`
      );
    })
    .catch((error) => {
      console.error(error);
    });
}
buttonPrayer.addEventListener("click", () => {
  getLocation();
});

// Tigger PrayerApi Function
function prayerApi(apiLink) {
  // Fetch Data And Convert It To JavaScript Object
  fetch(apiLink)
    .then((data) => data.json())
    .then((allPrayers) => {
      const div = document.querySelector(".flex-container-prayer");
      const divc = document.querySelector(".container");
      div.classList.remove("hidden");
      divc.classList.remove("container-button");
      document.querySelector(".getprayer").classList.add("hidden");
      prayerTime[0].innerHTML = allPrayers.data.timings.Fajr;
      // Set Dhuhr
      prayerTime[1].innerHTML = allPrayers.data.timings.Dhuhr;
      // Set Asr
      prayerTime[2].innerHTML = allPrayers.data.timings.Asr;
      // Set Maghrib
      prayerTime[3].innerHTML = allPrayers.data.timings.Maghrib;
      // Set Isha
      prayerTime[4].innerHTML = allPrayers.data.timings.Isha;
      // Set Midnight
      prayerTime[5].innerHTML = allPrayers.data.timings.Midnight;
    });
}
