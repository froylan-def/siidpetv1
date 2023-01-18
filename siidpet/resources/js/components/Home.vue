<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h3>Default</h3>
                        <fluent-combobox placeholder="Select a graphics card">
                        <fluent-option value="1">GTX 1060</fluent-option>
                        <fluent-option value="2">GTX 1070</fluent-option>
                        <fluent-option value="3">GTX 1080</fluent-option>
                        <fluent-option value="4" disabled>GTX 1090</fluent-option>
                        </fluent-combobox>

                        <h3>With autocomplete</h3>
                        <fluent-combobox autocomplete="both" placeholder="Select a graphics card">
                        <fluent-option value="1">GTX 1060</fluent-option>
                        <fluent-option value="2">GTX 1070</fluent-option>
                        <fluent-option value="3">GTX 1080</fluent-option>
                        <fluent-option value="4" disabled>GTX 1090</fluent-option>
                        </fluent-combobox>

                        <h3>Disabled</h3>
                        <fluent-combobox disabled placeholder="Select an option">
                        <fluent-option value="1">Option 1</fluent-option>
                        <fluent-option value="2">Option 2</fluent-option>
                        <fluent-option value="3">Option 3</fluent-option>
                        </fluent-combobox>
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