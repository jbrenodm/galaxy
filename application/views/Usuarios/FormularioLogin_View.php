<body class="bg-gradient-primary">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9 justify-content-center row">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div class="p-5">
                  
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bem Vindo!</h1>
                  </div>

                  <?php
                    echo form_open("Login_C/logar", ["class" => "user"]);                   
                      echo '<div class="form-group">';
                        echo form_input(
                          [
                            "type" => "email",
                            "class" => "form-control form-control-user",
                            "id" => "email",
                            "name" => "email",
                            "aria-describedby" => "emailHelp",
                            "placeholder" => "Endereço de E-mail..."
                          ]
                        );
                      echo '</div>';
                      
                      echo '<div class="form-group">';
                        echo form_input(
                          [
                            "type" => "password",
                            "class" => "form-control form-control-user",
                            "id" => "password",
                            "name" => "password",
                            "placeholder" => "Senha"
                          ]
                        );
                      echo '</div>';
                      
                      echo '<div class="form-group">';
                        echo '<div class="custom-control custom-checkbox small">';
                          echo form_input(
                            [
                              "type" => "checkbox",
                              "class" => "custom-control-input",
                              "id" => "lembre_me",
                              "name" => "lembre_me"
                            ]
                          );
                          echo form_label('Lembre-me','lembre_me', ["class" => "custom-control-label"]);
                        echo '</div>';
                      echo '</div>';
                      
                      echo form_button(
                        [
                          "class" => "btn btn-primary btn-user btn-block",
                          "type" => "submit",
                          "content" => "Login" 
                        ]
                      );
                    echo form_close();                                      
                  ?>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Esqueceu a Senha?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Criar Usuário!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

