
let key_tomtom = import.meta.env.VITE_KEY_TOMTOM

var options = {
    searchOptions: {
    key: key_tomtom,
    language: "it-IT",
    limit: 5,
    countrySet : 'IT',
    extendedPostalCodesFor: 'PAD,Addr'
    },
    autocompleteOptions: {
    key: key_tomtom,
    language: "it-IT",
    countrySet : 'IT'
    },
    placeholder : 'es. (Via Roma 30, 30020 Fossalta di Piave)',
    minNumberOfCharacters : 4,
    showSearchButton : false,
    cssStyleCheck : false

}
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
var addressLabel = document.getElementById('address-label')
var addressSpan = document.getElementById('address-span')
addressLabel.after(searchBoxHTML)
var inputAddress = document.getElementsByClassName('tt-search-box-input')[0]
inputAddress.classList.add('form-control')
inputAddress.setAttribute('name', 'address')
inputAddress.setAttribute('autocomplete', 'off')
inputAddress.setAttribute('required', true)
const inputBox = document.getElementsByClassName('tt-search-box-input-container')[0]
inputBox.classList.add('position-relative')
const resultBox = document.getElementsByClassName('tt-search-box-result-list-container')[0]
resultBox.classList.add('position-absolute', 'bg-white')


//if the span is empty leave the palceholder
if (addressSpan.textContent != '  ' ) {
    inputAddress.setAttribute('value', addressSpan.textContent)
}