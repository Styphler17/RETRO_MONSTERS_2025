/**
 * Gère le chargement asynchrone des pages
 * @param {number} page - Le numéro de la page à charger
 */
function loadPage(page) {
  document.querySelector("main").style.opacity = "0.5";
  fetch(`?page=${page}`)
    .then((response) => response.text())
    .then((html) => {
      const doc = new DOMParser().parseFromString(html, "text/html");
      ["#monsters-grid", "#page-numbers", "#prev-next-buttons"].forEach(
        (selector) => {
          const newContent = doc.querySelector(selector);
          const currentContent = document.querySelector(selector);
          if (newContent && currentContent)
            currentContent.innerHTML = newContent.innerHTML;
        }
      );
      window.history.pushState(
        {},
        "",
        new URL(window.location).searchParams.set("page", page)
      );
      document.querySelector("main").style.opacity = "1";
    })
    .catch((error) => {
      console.error("Error loading page:", error);
      document.querySelector("main").style.opacity = "1";
    });
}

/**
 * Gère le bouton de nettoyage de la recherche
 */
const clearBtn = document.getElementById('clear-search');
const searchInput = document.getElementById('search-input');
function toggleClearBtn() {
    if (searchInput.value.length > 0) {
        clearBtn.style.display = 'block';
    } else {
        clearBtn.style.display = 'none';
    }
}
if (clearBtn && searchInput) {
    clearBtn.addEventListener('click', function() {
        searchInput.value = '';
        searchInput.focus();
        toggleClearBtn();
    });
    searchInput.addEventListener('input', toggleClearBtn);
    // Initial state
    toggleClearBtn();
}
