
<div id="jsGrid"></div>


<script>
    let ss;
    function listarClientes() {
        $.ajax({
            type: "GET",
            url: "/listarClientes",
            data: "data",
            dataType: "json",
            success: function(response) {
                console.log(response);
                globalResponse = response;
                criarJsGrid();
               
                
            }
        });

    }
    function criarJsGrid() {
    $("#jsGrid").jsGrid({
                    width: "100%",
                    height: "400px",
                    inserting: true,
                    editing: true,
                    sorting: true,
                    paging: true,
                    data: globalResponse,

                    fields: [{
                            name: "nomeCliente",
                            title: "Nome",
                            type: "text",
                            width: 150,
                      
                        },

                        {
                            type: "control"
                        }
                    ]
                });
            }
</script>
