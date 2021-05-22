$('#grid_table').jsGrid({

    width: "100%",
    height: "600px",

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
                url: "jsGridFetchdata/fetch_subjecttopics.php",
                data: filter
            });
        },
        insertItem: function (item) {
            return $.ajax({
                type: "POST",
                url: "jsGridFetchdata/fetch_subjecttopics.php",
                data: item
            });
        },
        updateItem: function (item) {
            return $.ajax({
                type: "PUT",
                url: "jsGridFetchdata/fetch_subjecttopics.php",
                data: item
            });
        },
        deleteItem: function (item) {
            return $.ajax({
                type: "DELETE",
                url: "jsGridFetchdata/fetch_subjecttopics.php",
                data: item
            });
        },
    },

    fields: [{
            name: "id",
            width: 150,
            title: "ID"
        },
        {
            name: "subjectid",
            type: "text",
            width: 150,
            validate: "required",
            title: "Subject"
        },
        {
            name: "topic",
            type: "text",
            width: 150,
            validate: "required",
            title: "Topic",

        },
        // {
        //     name: "age",
        //     type: "text",
        //     width: 50,
        //     validate: function (value) {
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