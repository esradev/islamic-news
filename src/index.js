(() => {
  "use strict";
  /**
   * Mobile Menu - JavaScript
   * Now handled by Alpine.js
   */

  /**
   * Desktop Menu - JavaScript
   * Now handled by Alpine.js
   */

  /**
   * Go to top button
   * TODO not work!
   */
  // document.getElementById('top').addEventListener('click', function (event) {
  //   event.preventDefault()
  //   window.scrollTo({
  //     top: 0,
  //     behavior: 'smooth'
  //   })
  // })

  /**
   * Select order
   */
  if (document.getElementById("order")) {
    document.getElementById("order").addEventListener("change", function () {
      document.getElementById("orderForm").submit();
    });
  }

  /**
   * Search functionality
   */
  const clonableContent = document.querySelector("#li-template").content;
  let ourTimer = null;
  let previousSearchValue = "";
  const searchField = document.querySelector("#search-field");
  const searchOverlay = document.querySelector("#search-overlay");

  document.querySelector("#search-icon").addEventListener("click", openSearch);

  function openSearch() {
    console.log("clicked");
    searchOverlay.classList.remove("invisible", "opacity-0", "scale-125");
    searchOverlay.classList.add("scale-100", "opacity-100");

    setTimeout(() => {
      searchField.focus();
    }, 50);
  }

  document
    .querySelector("#close-overlay-icon")
    .addEventListener("click", closeSearch);

  function closeSearch() {
    searchOverlay.classList.add("scale-125", "opacity-0");
    searchOverlay.classList.remove("scale-100", "opacity-100");
    searchField.blur();
    setTimeout(() => {
      searchOverlay.classList.add("invisible");
    }, 301);
  }

  searchField.addEventListener("keyup", handleInputChange);

  function handleInputChange(e) {
    // when to show spinner loader and hide default message
    if (e.target.value.trim() != previousSearchValue) {
      if (e.target.value.trim() != "") {
        document.querySelector("#loading-icon").classList.remove("hidden");
        document.querySelector("#default-message").classList.add("hidden");
        document.querySelector("#no-results-message").classList.add("hidden");
        document.querySelector("#results-area").classList.add("hidden");
      }

      if (e.target.value.trim() == "") {
        document.querySelector("#results-area").classList.add("hidden");
        document.querySelector("#loading-icon").classList.add("hidden");
        document.querySelector("#default-message").classList.remove("hidden");
        document.querySelector("#no-results-message").classList.add("hidden");
        clearTimeout(ourTimer);
        return;
      }

      clearTimeout(ourTimer);

      ourTimer = setTimeout(() => {
        actuallyFetchData(e.target.value);
      }, 750);
    }

    previousSearchValue = e.target.value.trim();
  }

  async function actuallyFetchData(term) {
    // 1 actually fetch data
    const results = await getResultsData(term);
    console.log(results);

    if (results.length == 0) {
      document.querySelector("#no-results-message").classList.remove("hidden");
      document.querySelector("#loading-icon").classList.add("hidden");
      return;
    }

    const wrapper = document.createDocumentFragment();
    results.forEach((item) => {
      const clone = clonableContent.cloneNode(true);
      clone.querySelector("a").href = item.url;
      clone.querySelector(".title-text").textContent = item.title;
      wrapper.appendChild(clone);
    });

    document.querySelector("#results-area").innerHTML = "";
    document.querySelector("#results-area").appendChild(wrapper);

    document.querySelector("#results-area").classList.remove("hidden");
    document.querySelector("#loading-icon").classList.add("hidden");
  }

  async function getResultsData(term) {
    // Encode the search term to support non-ASCII (e.g., Persian/Arabic) characters
    const encodedTerm = encodeURIComponent(term);
    // Get current language code from hidden input
    const langInput = document.getElementById("current-lang-code");
    const lang = langInput ? langInput.value : "fa";
    // Add lang param for WPML/Polylang compatibility
    const resultsPromise = await fetch(
      ourData.root_url +
        `/wp-json/wp/v2/search?search=${encodedTerm}&lang=${lang}`
    );
    const results = await resultsPromise.json();
    return results;
  }

  /** language switcher */
  document.addEventListener("DOMContentLoaded", function () {
    const group = document.getElementById("lang-switcher-group");
    const dropdown = document.getElementById("lang-switcher-dropdown");
    const btn = document.getElementById("lang-switcher-btn");
    if (group && dropdown && btn && !btn.disabled) {
      group.addEventListener("mouseenter", function () {
        dropdown.classList.remove("opacity-0", "invisible");
        dropdown.classList.add("opacity-100", "visible");
      });
      group.addEventListener("mouseleave", function () {
        dropdown.classList.remove("opacity-100", "visible");
        dropdown.classList.add("opacity-0", "invisible");
      });
    }
  });
})();
