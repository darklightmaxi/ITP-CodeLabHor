document.getElementById('submission').addEventListener('submit', function(event) {
    // Überprüfen, ob das Textfeld leer ist
    var textfeld = document.getElementById('sub');
    if (textfeld.value === '') {
      // Wenn leer, setze den vordefinierten Text
      textfeld.value = '@Test\npublic void test(){\n\n}';
    }
});