$('#grid_table').jsGrid({

    width: "100%",
    height: "1000px",

    filtering: true,
    inserting: true,
    editing: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 10,
    pageButtonCount: 10,
    deleteConfirm: "Do you really want to delete data?",

    controller: {
        loadData: function (filter) {
            return $.ajax({
                type: "GET",
                url: "jsGridFetchdata/fetch_users.php",
                data: filter
            });
        },
        insertItem: function (item) {
            return $.ajax({
                type: "POST",
                url: "jsGridFetchdata/fetch_users.php",
                data: item
            });
        },
        updateItem: function (item) {
            return $.ajax({
                type: "PUT",
                url: "jsGridFetchdata/fetch_users.php",
                data: item
            });
        },
        deleteItem: function (item) {
            return $.ajax({
                type: "DELETE",
                url: "jsGridFetchdata/fetch_users.php",
                data: item
            });
        },
    },

    fields: [{
            name: "userid",
            width: 150,
            title: "ID",
            css: "hide"
        },
        {
            name: "username",
            type: "text",
            width: 150,
            validate: "required",
            title: "Username"
        },
        {
            name: "firstname",
            type: "text",
            width: 150,
            validate: "required",
            title: "Firstname"
        },
        {
            name: "middlename",
            type: "text",
            width: 150,
            validate: "required",
            title: "Middlename"
        },
        {
            name: "lastname",
            type: "text",
            width: 150,
            validate: "required",
            title: "Lastname"
        },
        {
            name: "birthdate",
            type: "text",
            width: 150,
            validate: "required",
            title: "Birthdate"
        },
        {
            name: "role",
            type: "text",
            width: 150,
            validate: "required",
            title: "Role"
        },
        {
            name: "bionote",
            type: "text",
            width: 150,
            validate: "required",
            title: "Bionote"
        },
        {
            name: "phone_number",
            type: "text",
            width: 150,
            validate: "required",
            title: "Phone"
        },
        {
            name: "email",
            type: "text",
            width: 150,
            validate: "required",
            title: "Email"
        },
        // {
        //     name: "last_name",
        //     type: "text",
        //     width: 150,
        //     validate: "required"
        // },

        // {
        //     name: "age",
        //     type: "text",
        //     width: 50,
        //     validate: function(value) {
        //         if (value > 0) {
        //             return true;
        //         }
        //     }
        // },
        // {
        //     name: "gender",
        //     type: "select",
        //     items: [{
        //             Name: "",
        //             Id: ''
        //         },
        //         {
        //             Name: "Male",
        //             Id: 'male'
        //         },
        //         {
        //             Name: "Female",
        //             Id: 'female'
        //         }
        //     ],
        //     valueField: "Id",
        //     textField: "Name",
        //     validate: "required"
        // },
        {
            type: "control"
        }
    ]

});