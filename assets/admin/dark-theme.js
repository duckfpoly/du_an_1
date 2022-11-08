

// get cookie
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}



// Light Mode / Dark Mode
function darkMode(el) {
  if (el.checked) {
    const body = document.getElementsByTagName("body")[0];
    const hr = document.querySelectorAll("div:not(.sidenav) > hr");
    const sidebar = document.querySelector(".sidenav");
    const sidebarWhite = document.querySelectorAll(".sidenav.bg-white");
    const hr_card = document.querySelectorAll("div:not(.bg-gradient-dark) hr");
    const text_btn = document.querySelectorAll("button:not(.btn) > .text-dark");
    const text_span = document.querySelectorAll(
      "span.text-dark, .breadcrumb .text-dark"
    );
    const text_span_white = document.querySelectorAll("span.text-white");
    const text_strong = document.querySelectorAll("strong.text-dark");
    const text_strong_white = document.querySelectorAll("strong.text-white");
    const text_nav_link = document.querySelectorAll("a.nav-link.text-dark");
    const secondary = document.querySelectorAll(".text-secondary");
    const bg_gray_100 = document.querySelectorAll(".bg-gray-100");
    const bg_gray_600 = document.querySelectorAll(".bg-gray-600");
    const btn_text_dark = document.querySelectorAll(
      ".btn.btn-link.text-dark, .btn .ni.text-dark"
    );
    const btn_text_white = document.querySelectorAll(
      ".btn.btn-link.text-white, .btn .ni.text-white"
    );
    const card_border = document.querySelectorAll(".card.border");
    const card_border_dark = document.querySelectorAll(
      ".card.border.border-dark"
    );
    const svg = document.querySelectorAll("g");
    const navbarBrand = document.querySelector(".navbar-brand-img");
    const navbarBrandImg = navbarBrand.src;
    const navLinks = document.querySelectorAll(
      ".navbar-main .nav-link, .navbar-main .breadcrumb-item, .navbar-main .breadcrumb-item a, .navbar-main h6"
    );
    const cardNavLinksIcons = document.querySelectorAll(
      ".card .nav .nav-link i"
    );
    const cardNavSpan = document.querySelectorAll(".card .nav .nav-link span");
    document.cookie = "theme=dark; expires=Thu, 31 Dec 2099 12:00:00 UTC";
    body.classList.add("dark-version");
    if (navbarBrandImg.includes("logo-ct-dark.png")) {
      var navbarBrandImgNew = navbarBrandImg.replace("logo-ct-dark", "logo-ct");
      navbarBrand.src = navbarBrandImgNew;
    }
    for (var i = 0; i < cardNavLinksIcons.length; i++) {
      if (cardNavLinksIcons[i].classList.contains("text-dark")) {
        cardNavLinksIcons[i].classList.remove("text-dark");
        cardNavLinksIcons[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < cardNavSpan.length; i++) {
      if (cardNavSpan[i].classList.contains("text-sm")) {
        cardNavSpan[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < hr.length; i++) {
      if (hr[i].classList.contains("dark")) {
        hr[i].classList.remove("dark");
        hr[i].classList.add("light");
      }
    }
    for (var i = 0; i < hr_card.length; i++) {
      if (hr_card[i].classList.contains("dark")) {
        hr_card[i].classList.remove("dark");
        hr_card[i].classList.add("light");
      }
    }
    for (var i = 0; i < text_btn.length; i++) {
      if (text_btn[i].classList.contains("text-dark")) {
        text_btn[i].classList.remove("text-dark");
        text_btn[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < text_span.length; i++) {
      if (text_span[i].classList.contains("text-dark")) {
        text_span[i].classList.remove("text-dark");
        text_span[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < text_strong.length; i++) {
      if (text_strong[i].classList.contains("text-dark")) {
        text_strong[i].classList.remove("text-dark");
        text_strong[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < text_nav_link.length; i++) {
      if (text_nav_link[i].classList.contains("text-dark")) {
        text_nav_link[i].classList.remove("text-dark");
        text_nav_link[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < secondary.length; i++) {
      if (secondary[i].classList.contains("text-secondary")) {
        secondary[i].classList.remove("text-secondary");
        secondary[i].classList.add("text-white");
        secondary[i].classList.add("opacity-8");
      }
    }
    for (var i = 0; i < bg_gray_100.length; i++) {
      if (bg_gray_100[i].classList.contains("bg-gray-100")) {
        bg_gray_100[i].classList.remove("bg-gray-100");
        bg_gray_100[i].classList.add("bg-gray-600");
      }
    }
    for (var i = 0; i < btn_text_dark.length; i++) {
      btn_text_dark[i].classList.remove("text-dark");
      btn_text_dark[i].classList.add("text-white");
    }
    for (var i = 0; i < sidebarWhite.length; i++) {
      sidebarWhite[i].classList.remove("bg-white");
    }
    for (var i = 0; i < svg.length; i++) {
      if (svg[i].hasAttribute("fill")) {
        svg[i].setAttribute("fill", "#fff");
      }
    }
    for (var i = 0; i < card_border.length; i++) {
      card_border[i].classList.add("border-dark");
    }
  } else {
    document.cookie = "theme=dark; expires=Thu, 01 Jun 2003 12:00:00 UTC";
    body.classList.remove("dark-version");
    sidebar.classList.add("bg-white");
    if (navbarBrandImg.includes("logo-ct.png")) {
      var navbarBrandImgNew = navbarBrandImg.replace("logo-ct", "logo-ct-dark");
      navbarBrand.src = navbarBrandImgNew;
    }
    for (var i = 0; i < navLinks.length; i++) {
      if (navLinks[i].classList.contains("text-dark")) {
        navLinks[i].classList.add("text-white");
        navLinks[i].classList.remove("text-dark");
      }
    }
    for (var i = 0; i < cardNavLinksIcons.length; i++) {
      if (cardNavLinksIcons[i].classList.contains("text-white")) {
        cardNavLinksIcons[i].classList.remove("text-white");
        cardNavLinksIcons[i].classList.add("text-dark");
      }
    }
    for (var i = 0; i < cardNavSpan.length; i++) {
      if (cardNavSpan[i].classList.contains("text-white")) {
        cardNavSpan[i].classList.remove("text-white");
      }
    }
    for (var i = 0; i < hr.length; i++) {
      if (hr[i].classList.contains("light")) {
        hr[i].classList.add("dark");
        hr[i].classList.remove("light");
      }
    }
    for (var i = 0; i < hr_card.length; i++) {
      if (hr_card[i].classList.contains("light")) {
        hr_card[i].classList.add("dark");
        hr_card[i].classList.remove("light");
      }
    }
    for (var i = 0; i < text_btn.length; i++) {
      if (text_btn[i].classList.contains("text-white")) {
        text_btn[i].classList.remove("text-white");
        text_btn[i].classList.add("text-dark");
      }
    }
    for (var i = 0; i < text_span_white.length; i++) {
      if (
        text_span_white[i].classList.contains("text-white") &&
        !text_span_white[i].closest(".sidenav") &&
        !text_span_white[i].closest(".card.bg-gradient-dark")
      ) {
        text_span_white[i].classList.remove("text-white");
        text_span_white[i].classList.add("text-dark");
      }
    }
    for (var i = 0; i < text_strong_white.length; i++) {
      if (text_strong_white[i].classList.contains("text-white")) {
        text_strong_white[i].classList.remove("text-white");
        text_strong_white[i].classList.add("text-dark");
      }
    }
    for (var i = 0; i < secondary.length; i++) {
      if (secondary[i].classList.contains("text-white")) {
        secondary[i].classList.remove("text-white");
        secondary[i].classList.remove("opacity-8");
        secondary[i].classList.add("text-dark");
      }
    }
    for (var i = 0; i < bg_gray_600.length; i++) {
      if (bg_gray_600[i].classList.contains("bg-gray-600")) {
        bg_gray_600[i].classList.remove("bg-gray-600");
        bg_gray_600[i].classList.add("bg-gray-100");
      }
    }
    for (var i = 0; i < svg.length; i++) {
      if (svg[i].hasAttribute("fill")) {
        svg[i].setAttribute("fill", "#252f40");
      }
    }
    for (var i = 0; i < btn_text_white.length; i++) {
      if (!btn_text_white[i].closest(".card.bg-gradient-dark")) {
        btn_text_white[i].classList.remove("text-white");
        btn_text_white[i].classList.add("text-dark");
      }
    }
    for (var i = 0; i < card_border_dark.length; i++) {
      card_border_dark[i].classList.remove("border-dark");
    }
  }
}

setDarkTheme();
function setDarkTheme() {
  document.querySelector("#dark-version").setAttribute("checked", "true");
  var theme = getCookie("theme");
  if (theme == "dark") {
    const body = document.getElementsByTagName("body")[0];
    const hr = document.querySelectorAll("div:not(.sidenav) > hr");
    const sidebar = document.querySelector(".sidenav");
    const sidebarWhite = document.querySelectorAll(".sidenav.bg-white");
    const hr_card = document.querySelectorAll("div:not(.bg-gradient-dark) hr");
    const text_btn = document.querySelectorAll("button:not(.btn) > .text-dark");
    const text_span = document.querySelectorAll(
      "span.text-dark, .breadcrumb .text-dark"
    );
    const text_span_white = document.querySelectorAll("span.text-white");
    const text_strong = document.querySelectorAll("strong.text-dark");
    const text_strong_white = document.querySelectorAll("strong.text-white");
    const text_nav_link = document.querySelectorAll("a.nav-link.text-dark");
    const secondary = document.querySelectorAll(".text-secondary");
    const bg_gray_100 = document.querySelectorAll(".bg-gray-100");
    const bg_gray_600 = document.querySelectorAll(".bg-gray-600");
    const btn_text_dark = document.querySelectorAll(
      ".btn.btn-link.text-dark, .btn .ni.text-dark"
    );
    const btn_text_white = document.querySelectorAll(
      ".btn.btn-link.text-white, .btn .ni.text-white"
    );
    const card_border = document.querySelectorAll(".card.border");
    const card_border_dark = document.querySelectorAll(
      ".card.border.border-dark"
    );
    const svg = document.querySelectorAll("g");
    const navbarBrand = document.querySelector(".navbar-brand-img");
    const navbarBrandImg = navbarBrand.src;
    const navLinks = document.querySelectorAll(
      ".navbar-main .nav-link, .navbar-main .breadcrumb-item, .navbar-main .breadcrumb-item a, .navbar-main h6"
    );
    const cardNavLinksIcons = document.querySelectorAll(
      ".card .nav .nav-link i"
    );
    const cardNavSpan = document.querySelectorAll(".card .nav .nav-link span");
    body.classList.add("dark-version");
    if (navbarBrandImg.includes("logo-ct-dark.png")) {
      var navbarBrandImgNew = navbarBrandImg.replace("logo-ct-dark", "logo-ct");
      navbarBrand.src = navbarBrandImgNew;
    }
    for (var i = 0; i < cardNavLinksIcons.length; i++) {
      if (cardNavLinksIcons[i].classList.contains("text-dark")) {
        cardNavLinksIcons[i].classList.remove("text-dark");
        cardNavLinksIcons[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < cardNavSpan.length; i++) {
      if (cardNavSpan[i].classList.contains("text-sm")) {
        cardNavSpan[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < hr.length; i++) {
      if (hr[i].classList.contains("dark")) {
        hr[i].classList.remove("dark");
        hr[i].classList.add("light");
      }
    }
    for (var i = 0; i < hr_card.length; i++) {
      if (hr_card[i].classList.contains("dark")) {
        hr_card[i].classList.remove("dark");
        hr_card[i].classList.add("light");
      }
    }
    for (var i = 0; i < text_btn.length; i++) {
      if (text_btn[i].classList.contains("text-dark")) {
        text_btn[i].classList.remove("text-dark");
        text_btn[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < text_span.length; i++) {
      if (text_span[i].classList.contains("text-dark")) {
        text_span[i].classList.remove("text-dark");
        text_span[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < text_strong.length; i++) {
      if (text_strong[i].classList.contains("text-dark")) {
        text_strong[i].classList.remove("text-dark");
        text_strong[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < text_nav_link.length; i++) {
      if (text_nav_link[i].classList.contains("text-dark")) {
        text_nav_link[i].classList.remove("text-dark");
        text_nav_link[i].classList.add("text-white");
      }
    }
    for (var i = 0; i < secondary.length; i++) {
      if (secondary[i].classList.contains("text-secondary")) {
        secondary[i].classList.remove("text-secondary");
        secondary[i].classList.add("text-white");
        secondary[i].classList.add("opacity-8");
      }
    }
    for (var i = 0; i < bg_gray_100.length; i++) {
      if (bg_gray_100[i].classList.contains("bg-gray-100")) {
        bg_gray_100[i].classList.remove("bg-gray-100");
        bg_gray_100[i].classList.add("bg-gray-600");
      }
    }
    for (var i = 0; i < btn_text_dark.length; i++) {
      btn_text_dark[i].classList.remove("text-dark");
      btn_text_dark[i].classList.add("text-white");
    }
    for (var i = 0; i < sidebarWhite.length; i++) {
      sidebarWhite[i].classList.remove("bg-white");
    }
    for (var i = 0; i < svg.length; i++) {
      if (svg[i].hasAttribute("fill")) {
        svg[i].setAttribute("fill", "#fff");
      }
    }
    for (var i = 0; i < card_border.length; i++) {
      card_border[i].classList.add("border-dark");
    }
  } else {
    body.classList.remove("dark-version");
    sidebar.classList.add("bg-white");
  }
}