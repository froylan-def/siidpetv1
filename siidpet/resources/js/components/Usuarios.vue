<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> Usuarios </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title"> Datos registrados de los peticionarios </h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fas fa-bars"></i>
                            </a>

                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-user-plus"></i> Agregar
                            </button>

                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <span class="ml-2">Campo de busqueda: </span>
                                <select class="custom-select form-control-border ml-2" v-model="searchField">
                                    <option>player</option>
                                    <option>team</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <span class=""> Valor: </span>
                                <input class="form-control form-control-border border-width-2 mr-2"
                                    v-model="searchValue" placeholder="Juanito perez" />
                            </div>
                        </div>

                        <EasyDataTable buttons-pagination :headers="headers" :items="items" :theme-color="themeColor"
                            :search-field="searchField" :search-value="searchValue" show-index />
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Agregar usuario </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Introduce nombre">
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Introduce apellido">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Edad</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Introduce edad">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Telefono</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    placeholder="Introduce Telefono">

                                    
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i
                                class="fas fa-times"></i> Cancelar </button>
                        <button type="button" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script lang="ts">
import { ref } from "vue";
import type { Header, Item } from "vue3-easy-data-table";





export default {
    setup() {

        const searchField = ref("player");
        const searchValue = ref("");

        const headers: Header[] = [
            { text: "PLAYER", value: "player" },
            { text: "TEAM", value: "team" },
            { text: "NUMBER", value: "number" },
            { text: "POSITION", value: "position" },
            { text: "HEIGHT", value: "height" },
            { text: "WEIGHT (lbs)", value: "weight", sortable: true },
            { text: "LAST ATTENDED", value: "lastAttended" },
            { text: "COUNTRY", value: "country" },
        ];

        const items: Item[] = [
            { "player": "Stephen Curry", "team": "GSW", "number": 30, "position": 'G', "height": '6-2', "weight": 185, "lastAttended": "Davidson", "country": "USA" },
            { "player": "Lebron James", "team": "LAL", "number": 6, "position": 'F', "height": '6-9', "weight": 250, "lastAttended": "St. Vincent-St. Mary HS (OH)", "country": "USA" },
            { "player": "Kevin Durant", "team": "BKN", "number": 7, "position": 'F', "height": '6-10', "weight": 240, "lastAttended": "Texas-Austin", "country": "USA" },
            { "player": "Giannis Antetokounmpo", "team": "MIL", "number": 34, "position": 'F', "height": '6-11', "weight": 242, "lastAttended": "Filathlitikos", "country": "Greece" },
        ];

        const themeColor = "#AB0033";

        return {
            headers,
            items,
            searchField,
            searchValue,
            themeColor
        };
    },

    computed: {
        parametersTable2() {
            return {
                data: [
                    {
                        "id": 1,
                        "name": "Prof. Seth Howell DVM",
                        "email": "crystal.prosacco@example.org",
                        "email_verified_at": "2012-02-19 13:28:17",
                        "created_at": "2020-02-23 21:29:25",
                        "updated_at": "2020-02-23 21:29:25",
                        "gender": "Female",
                        "suffix": "Jr.",
                        "title": "Dr.",
                        "username": "turner.brenden",
                        "userAgent": "Mozilla\/5.0 (X11; Linux i686) AppleWebKit\/5360 (KHTML, like Gecko) Chrome\/40.0.868.0 Mobile Safari\/5360",
                        "creditCardType": "Visa",
                        "creditCardNumber": "2514800271552232",
                        "photo": "https:\/\/lorempixel.com\/640\/480\/?18703",
                        "info": "Occaecati aut rerum aliquam fugiat officia. Eveniet distinctio ut sapiente minus. Corporis omnis molestiae hic itaque neque voluptas.",
                        "bio": "Tempora nam ratione inventore aspernatur. Est eius necessitatibus expedita rerum quos quod fuga. Nobis ut saepe itaque ullam. Similique possimus tempora assumenda. Aperiam quasi ratione veritatis placeat enim consequuntur error architecto. Aut unde quasi nostrum blanditiis totam et et. Impedit accusamus enim harum velit quam consequatur.",
                        "city": "Hamillport",
                        "state": "South Dakota",
                        "streetName": "Mohr Mews",
                        "country": "American Samoa",
                        "timezone": "Europe\/Vilnius",
                        "job": "Recreational Therapist",
                        "phone": "+15372887819",
                        "company": "Doyle, Davis and Prohaska"
                    },
                    {
                        "id": 2,
                        "name": "Corine Kunde",
                        "email": "kokuneva@example.org",
                        "email_verified_at": "2003-12-07 12:05:58",
                        "created_at": "2020-02-23 21:29:25",
                        "updated_at": "2020-02-23 21:29:25",
                        "gender": "Male",
                        "suffix": "PhD",
                        "title": "Prof.",
                        "username": "archibald.bashirian",
                        "userAgent": "Opera\/8.89 (X11; Linux i686; sl-SI) Presto\/2.8.188 Version\/10.00",
                        "creditCardType": "Visa",
                        "creditCardNumber": "4024007188333",
                        "photo": "https:\/\/lorempixel.com\/640\/480\/?41675",
                        "info": "Voluptas provident voluptate quibusdam sit rem placeat. Rerum id perspiciatis atque nesciunt in nihil qui.",
                        "bio": "Possimus enim consequatur esse. Laborum numquam veniam provident impedit. Aut eaque nam explicabo et tempore. Vero ut enim numquam rerum tempora repudiandae architecto. Minima voluptatem doloremque nobis perspiciatis omnis. Consequuntur qui et consequatur voluptatem qui. Officiis et quis est in cum.",
                        "city": "North Orieburgh",
                        "state": "New Jersey",
                        "streetName": "Raynor Course",
                        "country": "Mali",
                        "timezone": "Indian\/Mauritius",
                        "job": "Forest and Conservation Technician",
                        "phone": "1-817-455-8407",
                        "company": "Hammes-Bergstrom"
                    },
                    {
                        "id": 3,
                        "name": "Ms. Ivy Mitchell I",
                        "email": "sebert@example.org",
                        "email_verified_at": "2013-07-19 19:02:18",
                        "created_at": "2020-02-23 21:29:38",
                        "updated_at": "2020-02-23 21:29:38",
                        "gender": "Male",
                        "suffix": "MD",
                        "title": "Dr.",
                        "username": "graham.missouri",
                        "userAgent": "Mozilla\/5.0 (compatible; MSIE 6.0; Windows 98; Trident\/4.0)",
                        "creditCardType": "Visa",
                        "creditCardNumber": "2623537579201603",
                        "photo": "https:\/\/lorempixel.com\/640\/480\/?71830",
                        "info": "Cumque cupiditate consequatur accusamus est inventore. Enim aut sed eaque quaerat ullam eaque ducimus. Suscipit sed non aliquid et voluptatibus corporis eos.",
                        "bio": "Et aut est quia aut magni eaque error. Voluptate minus inventore iusto qui. Magni asperiores ut consectetur impedit suscipit. Molestias quaerat in harum reiciendis atque dolore accusamus. Ut iure optio consequuntur nihil autem nesciunt omnis quo. Qui rem est enim enim voluptas soluta nostrum. Sequi quia blanditiis expedita et eum ratione reiciendis. Id enim officiis dicta.",
                        "city": "Alyceport",
                        "state": "Oregon",
                        "streetName": "Ross Corners",
                        "country": "Bouvet Island (Bouvetoya)",
                        "timezone": "Pacific\/Kiritimati",
                        "job": "Underground Mining",
                        "phone": "+17462914454",
                        "company": "Durgan-Bode"
                    },
                ],
                actionMode: "single",
                actions: ["view"],
                columns: [
                    { key: "id" },
                    {
                        key: "email",
                        title: "Email address"
                    },
                    { key: "username" },
                    { key: "company" },
                    {
                        key: "phone",
                        sortable: false
                    },
                    { key: "state" }
                ]
            };
        }
    },
    mounted() {
        console.log('Component mounted.')
    },

    methods: {
        handleAction(actionName, data) {
            console.log(actionName, data);
            window.alert("check out the console to see the logs");
        }
    }
}
</script>
