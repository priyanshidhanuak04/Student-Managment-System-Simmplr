const validation = new JustValidate("#signup");

  validation
      .addField("#name", [
        {
          rule: "required",
        }
      ])
      
      .addField("#regdno", [
        {
          rule: "required",
        },
        {
            validator: (value) => () => {
                return fetch("validate_regd.php?regdno=" + encodeURIComponent(value))
                .then(function(response) {
                    console.log(response.json);
                    return response.json();
                })
                .then(function(json) {
                return json.available;
                });
            },
            errorMessage: "Account with registration number already existss"
        }
      ])

      .addField("#dob", [
        {
          rule: "required",
        }
      ])

      .addField("#yos", [
        {
          rule: "required",
        }
      ])

      .addField("#branch", [
        {
          rule: "required",
        }
      ])

      .addField("#section", [
        {
          rule: "required",
        }
      ])

      .addField("#password", [
        {
          rule: "required",
        },
        {
            rule: "password",
        }
      ])

      .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
      ])
      .onSuccess((event) => {
        document.getElementById("signup").submit();
      });
