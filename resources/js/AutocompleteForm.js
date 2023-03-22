
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

//if the span is empty leave the palceholder
if (addressSpan.textContent != '  ' ) {
    inputAddress.setAttribute('value', addressSpan.textContent)
}