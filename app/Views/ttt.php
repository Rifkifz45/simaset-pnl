<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
      .truste_cursor_pointer {cursor: pointer;}.truste_border_none {border: none;}
    </style>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- /Added by HTTrack -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>IBMid - Sign in or create an IBMid</title>
    <meta content="width=device-width,initial-scale=1" name="viewport" />
    <?= $this->include('main.css') ?>
  </head>
  <body id="ibm-com" class="ibm-type">
    <div class="root" id="login-root-container">
      <div class="app-container">
        <div class="outer">
          <div class="middle">
            <div class="inner">
              <div class="bx--masthead">
                <div class="bx--masthead__l0">
                  <header style="text-align: center;" aria-label="IBM" data-autoid="dds--masthead" class="bx--header">
                      <span class="bx--header__name">
                        <span class="bx--header__name--prefix" style=""></span>
                        &nbsp;&nbsp;&nbsp;&nbsp;Simaset PNL
                      </span>
                    <div class="bx--header__search"></div>
                  </header>
                </div>
              </div>
              <div class="login-container">
                <div class="bx--row">
                  <div class="form-area bx--col">
                    <div class="bx--row">
                      <div class="bx--col">
                        <div class="login-form">
                          <form name="loginForm" method="POST" class="ibm-row-form"
                            action="<?= site_url('login/proses') ?>">
                            <div class="fields-container">
                              <div class="heading-container">
                                <div class="bx--row">
                                  <div class="bx--col">
                                    <div class="heading">Log in to SimasetPNL</div>
                                  </div>
                                </div>
                              </div>
                              <div class="bx--row">
                                <div class="bx--col">
                                  <div class="bx--form-item bx--text-input-wrapper">
                                    <label for="username" class="bx--label">Username
                                    </label>
                                    <div class="bx--text-input__field-outer-wrapper">
                                      <div class="bx--text-input__field-wrapper">
                                        <input id="username" type="text" class="bx--text-input bx--text-input--md" name="username" value=""/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="bx--row"><div class="bx--col"><div class="bx--form-item bx--text-input-wrapper bx--password-input-wrapper"><label for="password" class="bx--label">Password <a class="forgot-link" rel="noopener noreferrer" href="https://www.ibm.com/account/reg/us-en/reset-password?formid=urx-19776&amp;target=https%3A%2F%2Flogin.ibm.com%2F">Forgot password?</a></label><div class="bx--text-input__field-outer-wrapper"><div class="bx--text-input__field-wrapper"><input id="password" type="password" class="bx--text-input bx--password-input bx--text-input--md" name="password" data-toggle-password-visibility="true"><button type="button" onclick="myFunction()" class="bx--text-input--password__visibility__toggle bx--btn bx--btn--icon-only bx--tooltip__trigger bx--tooltip--a11y bx--tooltip--bottom bx--tooltip--align-center"><span class="bx--assistive-text">Show/Hide password</span><svg focusable="false" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" class="bx--icon-visibility-on"><path d="M15.5,7.8C14.3,4.7,11.3,2.6,8,2.5C4.7,2.6,1.7,4.7,0.5,7.8c0,0.1,0,0.2,0,0.3c1.2,3.1,4.1,5.2,7.5,5.3  c3.3-0.1,6.3-2.2,7.5-5.3C15.5,8.1,15.5,7.9,15.5,7.8z M8,12.5c-2.7,0-5.4-2-6.5-4.5c1-2.5,3.8-4.5,6.5-4.5s5.4,2,6.5,4.5 C13.4,10.5,10.6,12.5,8,12.5z"></path><path d="M8,5C6.3,5,5,6.3,5,8s1.3,3,3,3s3-1.3,3-3S9.7,5,8,5z M8,10c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S9.1,10,8,10z"></path></svg></button></div></div></div></div></div>
                              <div class="bx--row">
                                <div class="bx--col">
                                  <div class="remember-me-wrapper">
                                    <div class="bx--form-item bx--checkbox-wrapper">
                                      <input type="checkbox" class="bx--checkbox" id="remember"/>
                                      <label for="remember" class="bx--checkbox-label">
                                        <span class="bx--checkbox-label-text" dir="auto">
                                          <div
                                            id="__carbon-tooltip-trigger_vystddm6cwb"
                                            class="bx--tooltip__label"
                                            >
                                            Remember me
                                            <div
                                              class="bx--tooltip__trigger"
                                              role="button"
                                              tabindex="0"
                                              aria-labelledby="__carbon-tooltip-trigger_vystddm6cwb"
                                              >
                                            </div>
                                          </div>
                                        </span
                                          >
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="bx--row">
                              <div class="bx--col">
                                <div class="fields-container button-container">
                                  <button id="continue-button" tabindex="0" class="submit-button bx--btn bx--btn--primary" type="submit">
                                    Continue
                                    <svg focusable="false" preserveAspectRatio="xMidYMid meet"
                                      xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                      aria-hidden="true" width="16"
                                      height="16" viewBox="0 0 16 16" class="bx--btn__icon">
                                      <path d="M9.3 3.7L13.1 7.5 1 7.5 1 8.5 13.1 8.5 9.3 12.3 10 13 15 8 10 3z"></path>
                                    </svg>
                                  </button>
                                </div>
                              </div>
                            </div>
                            <div class="bx--row">
                              <div class="bx--col">
                                <div class="fields-container bottom-link-container">
                                  </p>
                                  <p class="register-text body-01">
                                    Back to Home
                                    <a
                                      href="https://www.ibm.com/account/reg/signup?formid=urx-19776"
                                      >Click Here</a
                                      >
                                  </p>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <footer class="bx--footer bx--footer--bottom-fixed- footer" role="contentinfo" aria-label="SIMASET" style="text-align:center;">
              <aside>
                <div id="ibm-footer">
                  <div class="ibm-fluid ibm-padding-bottom-0">
                    <div class="ibm-col-12-12">
                      <p style="color: #161616;">Copyright ©2022 All rights reserved | This template is made with by IBM</p>
                    </div>
                  </div>
                </div>
              </aside>
            </footer>
          </div>
        </div>
      </div>
    </div>
    <?= $this->include('main.js') ?>
    <?= $this->include('other.js') ?>
    <!-- Mirrored from login.ibm.com/authsvc/mtfim/sps/authsvc?PolicyId=urn:ibm:security:authentication:asf:basicldapuser by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Jun 2022 14:34:49 GMT -->
  </body>

  <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</html>