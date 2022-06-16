// ОПЕРАТОРЫ СРАВНЕНИЯ


let x = 25
let y = 5

let res = x > y

console.log( 'x == 5', x == 5)

let b = 'b'
let a = 'a'

console.log( 'b < a', b < a)

let str1 = 'abc'
let str2 = 'abbb'

console.log( 'str1 < str2', str1 < str2)

console.log( "'1' === 1", '1' === 1)

let variable = '0'
let variable1 = 1

console.log(Boolean(variable), Boolean(variable1))
console.log('variable == variable1', variable == variable1)

console.log('null == undefined', null == undefined)


console.log('null > 0', null > 0)
console.log('null == 0', null == 0)
console.log('null >= 0', null >= 0)

console.log(Number(null))


// УСЛОВНЫЕ КОНСТРУКЦИИ

let answer = prompt('какой сейчас год?')

if (answer == 2022) {
    alert('правильно!')
} else if(answer < 2022) {
  alert('не угадал, больше))')
} else {
    alert('меньше, меньше')
}

let age = 33
let access = age > 18 ? 'доступ есть' : 'доступа нет'
//let access = age > 18 && haveLicence // не надо писать, что haveLicence=true

console.log('access', access)

// ЛОГИЧЕСКИЕ ОПЕРАТОРЫ


let haveLicence = true
let number1 = 123
let string1 = ''

res = haveLicence || string1 || number1

if (res) {
    console.log('yes')
} else {
    console.log('no')
}

console.log(res)

// || находят первое истинное значение

res = haveLicence && string1 && number1

if (res) {
    console.log('yes')
} else {
    console.log('no')
}

console.log(res)

// && ищется ложное


// ЦИКЛЫ

let i = 0
while (i < 10) {
    console.log(i++)
}


let j = 0
for (let j = 0; j < 5; j++) {
    if (j == 2) {
        break
    }
    console.log(j)
}

console.log('j', j)

for (let j = 0; j < 5; j++) {
    if (j == 2) {
        continue
    }
    console.log(j)
}

console.log('j', j)