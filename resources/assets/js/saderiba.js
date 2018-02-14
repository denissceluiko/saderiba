$(document).ready(function() {
    $("#magic").submit(function(e) {
        e.preventDefault();
        var name1 = $("#name1").val();
        var name2 = $("#name2").val();
        calculate(name1, name2);
    });
});

function calculate(name1, name2) {
    var names = name1+name2;
    var letters = parseNames(names.toLowerCase());
    var numbers = getNumbers(letters);
    var result = countDigits(numbers);

    $(".progress-bar").animate({
        width: result+"%"
    }, {
        duration: 1500,
        start: function () {
            $(".progress-bar").text("").css('width', '0px');
        },
        complete: function () {
            $(".progress-bar").text(result+"%").attr('title', result+"%");
        }
    });
    $.ajax({
        'url': config.target,
        'method': 'post',
        'data': {'n1': name1, 'n2': name2, 's': result},
        headers: {
            'X-CSRF-TOKEN': config.csrfToken
        }
    });
}

function parseNames(names) {
    var letters = [];

    for (letter in names) {
        if (names[letter] == ' ') continue;
        var i=0;
        while (names[letter] > letters[i]) i++;
        letters.splice(i, 0, names[letter]);
    }
    return letters;
}


function getNumbers(letters) {
    var numbers = [];
    var count = 1;
    var prev = letters[0];
    for (var i=1; i<letters.length; i++) {
        if (letters[i] == prev) count++;
        else {
            numbers.push(count%10);
            count = 1;
        }
        prev = letters[i];
    }
    numbers.push(count); // last one
    return numbers;
}

function countDigits(digits) {
    if (digits.length < 3) return digits[1] ? digits[0]*10+digits[1] : digits[0];
    var nextRow = [];
    while (digits.length > 2) {
        for (var i = 0; i < digits.length - 1; i++) {
            nextRow.push((digits[i] + digits[i + 1]) % 10);
        }
        digits = nextRow;
        nextRow = [];
    }
    if (digits.join('') == 100) return 100;
    return digits[0]*10+digits[1];
}
