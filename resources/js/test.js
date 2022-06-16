fetch('/api/test')
   .then(response=> response.json())
   .then(users => console.log('users', users));


$.ajax({
    url: '/api/test',
    dataType: 'json',
    data: {
        id: 1
    },
    success: function (user) {
            console.log('user', user)
    },
    error: function (response) {
        console.log(response)
    }
})

let arr = [1, 2, 3]


for (value of arr) {
    console.log(value)
}
    
