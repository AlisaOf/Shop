console.log('Hello, World!!!')

let n = 10

n = 99

name1 = 'gfhffc'
Name1 = 'dsgrh'

const first_name = 'Alisa'

console.log(first_name)

// константы - в верхних регистрах
// name1 и Name1  - разные переменные


//  ТИПЫ ДАННЫХ

let a = 10
let b = 0

let result = a / b

console.log(result)

console.log(name1, typeof name1)

//узнаем тип данных

console.log(typeof a)

// NaN - Not a Number

console.log(name1 - a)

console.log(a + b)

console.log(a + '0')

let last_name = 'Ofitserova'
console.log(last_name, typeof last_name)

console.log(name1 + last_name)

console.log(2 ** 53 - 1)

let bg = 42123543n

console.log(bg, typeof bg)

let flag = false
console.log(flag, typeof flag)

let undefined_result
let new_result = null
console.log(new_result, typeof new_result)
console.log(undefined_result, typeof undefined_result)


let person = {
    name: 'Alisa',
    age: 33
}

console.log(person, typeof person)


//alert, prompt, confirm

//alert ('Вот это сообщение')

//console.log(typeof alert)

console.log('Вот это вот выводится после алерта')

//let age = prompt('How old are you?', 'default value')
//console.log(age)

//let access = confirm('Are you sure you want access?')
//console.log(access)

//  ПРИВЕДЕНИЕ ТИПОВ

let numb = 99
let numbString = String(numb)

console.log(numbString, typeof numbString)

numbString = Number(numbString)
console.log(numbString, typeof numbString)

let str = 'gdhdyioulvljv'

console.log( Number(str))

console.log(new_result, Number(new_result))
console.log(undefined_result,  Number(undefined_result))

console.log( Number('      123     '))