<template>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inicio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active"> </li>
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
                    <div class="card-header border-0">Total carpetass</div>

                    <div class="card-body">
                        <div id="piechart" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        


    </div>
</template>

<script>

export default {
    name: 'HelloWorld',
    data() {
        return {
            yourName: '',
            visible: false,
        };
    },
    methods: {
        onClick() {
            this.visible = true;
        },
        modalClosed() {
            this.visible = false;
        },
    },
};
</script>

<style>
.sample {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    max-width: 600px;
    margin: 5% auto;
}

.cv-text-input {
    margin: 30px 0;
}
</style>