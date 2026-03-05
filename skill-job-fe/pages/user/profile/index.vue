<template>
  <div class="page">
    <div class="container-xl">
      <div class="row">
          <div class="col-md-11 mb-2" style="margin-top: 4rem">
            <div class="pt-3" style="width: 81rem">
              <div class="card">
                <div class="card-body">
                    <div class="display-flex">
                      <div class="row">
                        <div class="col-md-8">
                          <h3 class="">Profile Completion</h3>
                        </div>
                        <div  class="col-md-4" style="text-align: end;font-weight: bold;font-size: 18px">
                          75%
                        </div>
                      </div>
                      <div>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-primary" style="width: 75.0%"></div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row" style="">
        <div class="col-md-8 mt-3">
          <div class="card">
            <div class="row">
              <div class="col-md-12">
                <div>
                  <tooltip title="cover image edit" type="button" class="bg-transparent"
                           style="position: absolute;right:20px">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                         fill="gray" class="d-flex rounded-top" width="50" height="50" focusable="false"
                    >
                      <path
                        d="M16 13a4 4 0 11-4-4 4 4 0 014 4zm6-4v11H2V9a3 3 0 013-3h1.3l1.2-3h9l1.2 3H19a3 3 0 013 3zm-5 4a5 5 0 10-5 5 5 5 0 005-5z"></path>
                    </svg>
                  </tooltip>
                  <img src="../../../components/images/cover.jpg" alt="" class="rounded-top"
                       width="940" height="250">
                </div>
<!--                <div class="column is-12 mx-4 d-flex ">-->
<!--                  <img class="profile-picture" src="../../../components/images/members/men-1.jpg" alt="profile-picture">-->
<!--                  <span class="mx-2">-->
<!--                    <h3 style="font-size: 20px">-->
<!--                      Pawel Ram-->
<!--                    </h3>-->
<!--                    <div class="subheader">-->
<!--                      2nd year StudentOld at King's College-->
<!--                    </div>-->
<!--                    <p>-->
<!--                      Java | Flatter-->
<!--                    </p></span>-->
<!--                </div>-->
                <div class="column is-12 d-flex justify-content-center">
                  <img class="profile-picture" src="../../../components/images/members/men-1.jpg" alt="profile-picture">
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="col-md-12 bg-light p-3" >
                <div class="row">
                  <div class="col-md-11">
                    <h3>
                      Pawel Ram
                    </h3>
                    <div class="subheader">
                      2nd year Student at King's College
                    </div>
                    <p>
                      Java | Flatter
                    </p>
                  </div>
                  <div class="col-md-1">
                    <a href="" style="color: black" data-bs-toggle="modal" data-bs-target="#modal-edit-profile">
                      <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                           width="24" height="24" focusable="false">
                        <path
                          d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                      </svg>
                    </a>
                  </div>
<!--                  <div class="col-md-4 d-flex justify-content-end">-->
<!--                    <h4>-->
<!--                      600 Followers | 789 Following-->
<!--                    </h4>-->
<!--                  </div>-->

                </div>
                <div class="row">
                  <div class="col-md-11">
                    <div class="subheader" style="font-size: 12px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-house-door mb-2" viewBox="0 0 16 16">
                        <path
                          d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                      </svg>
                      From Kandy District,Central Province,Sri Lanka
                    </div>
                    <div class="subheader mt-2" style="font-size: 12px">
                      <svg xmlns="http://www.w3.org/2000/svg" style="" class="bi bi-icon" width="16" height="16"
                           viewBox="0 0 28 28" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                      </svg>
                      raymond.redd@gmail.com
                    </div>
                    <div class="subheader mt-2" style="font-size: 12px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-telephone" viewBox="0 0 16 16">
                        <path
                          d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      </svg>
                      +94123456789
                    </div>
                    <div class="subheader mt-2" style="font-size: 12px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                           class="bi bi-link-45deg" viewBox="0 0 16 16">
                        <path
                          d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                        <path
                          d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                      </svg>
                      github / raymondR
                    </div>
<!--                    <div class="subheader mt-2">-->
<!--                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"-->
<!--                           class="bi bi-link-45deg" viewBox="0 0 16 16">-->
<!--                        <path-->
<!--                          d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>-->
<!--                        <path-->
<!--                          d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>-->
<!--                      </svg>-->
<!--                      bahance.net / raymondR-->
<!--                    </div>-->
                  </div>
                </div>
                <div class="row mt-3 ms-2 mx-2 mb-2">
                  <div class="card bg-light">
                    <div class="card-body">
                      <div class="col-md-12" style="color:gray;text-align: justify">
                        I am fresher and have no work experience in any company. My strength is that I can adapt quickly
                        to any environment.My short-term goal is to get placed in a reputed company like yours, which
                        will allow me to enhance my skills and Knowledge. My long term goal would be to reach a higher
                        position in your company. That’s all about me.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<!--          <div class="card mt-3">-->
<!--            <div class="card-body">-->
<!--              <div class="row">-->
<!--                <div class="card mt-3">-->
<!--                  <div class="card-body">-->
<!--                    <div class="row">-->
<!--                      <div class="col-md-2 pt-2">-->
<!--                        <a class="">-->
<!--                          <img src="../../components/images/members/men-1.jpg" alt="" id=""-->
<!--                               class="rounded-circle ember-view"-->
<!--                               width="60" height="55">-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="col-md-6 pt-2">-->
<!--                        <h3>-->
<!--                          Ramesh Kal - -->
<!--                          <span class="text-muted ">-->
<!--                        20 minute ago-->
<!--                      </span>-->
<!--                          <p class="subheader">-->
<!--                            SE Undergraduate-->
<!--                          </p>-->
<!--                        </h3>-->
<!--                      </div>-->
<!--                      <div class="row" style="width:800px ; height: 600px">-->
<!--                        <div class="col-md-12">-->
<!--                          <h3>-->
<!--                            NASA Invites Comment on Initial Plans for Mars Sample Return Program.-->
<!--                          </h3>-->
<!--                          <img src="../../components/images/news-feed/nasa.jpeg" alt="nasa" id=""-->
<!--                               width="800px" height="550px">-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      <div class="row">-->
<!--                        <div class="col-md-12" style="color: black">-->
<!--                          <div class="d-flex bd-highlight">-->
<!--                            <a href="#" class="card-btn flex-fill bd-highlight">-->
<!--                              Like-->
<!--                            </a>-->
<!--                            <a href="#" class="card-btn flex-fill bd-highlight">-->
<!--                              Comment-->
<!--                            </a>-->
<!--                            <a href="#" class="card-btn flex-fill bd-highlight">-->
<!--                              Share-->
<!--                            </a>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
          <div class="card mt-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-1 pt-2">
                  <a class="">
                    <img src="../../../components/images/members/men-1.jpg" alt="" id=""
                         class="rounded-circle ember-view"
                         width="60" height="55">
                  </a>
                </div>
                <div class="col-md-6 pt-2">
                  <h3>
                    Pawel Ram -
                    <span class="text-muted ">
                        20 minute ago
                      </span>
                    <p class="subheader">
                      SE Undergraduate
                    </p>
                  </h3>
                </div>
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <h3>
                      Windows form application development using setup installer.
                    </h3>
                    <p>
                      I have made a setup installer of my windows form application.How can i add application dates which
                      is already installed at client system?.
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2" style="color: red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-pencil" width="22"
                         height="22" viewBox="0 0 22 22" stroke-width="1" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                      <path d="M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z"></path>
                    </svg>
                    Answer
                  </div>
                  <div class="col-md-3">
                    <a href="">
                      <svg xmlns="http://www.w3.org/2000/svg" color="black" width="22" height="22" fill="currentColor"
                           stroke-width="1" class="bi bi-hand-thumbs-up" viewBox="0 0 22 22">
                        <path
                          d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                      </svg>
                    </a>
                    <a href="">
                      <svg xmlns="http://www.w3.org/2000/svg" color="black" class="bi bi-bookmark" width="22"
                           height="22" viewBox="0 0 22 22" stroke-width="1" stroke="currentColor" fill="none"
                           stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                          d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"></path>
                      </svg>
                    </a>
                    <a href="">
                      <svg xmlns="http://www.w3.org/2000/svg" color="black" width="22" height="22" stroke-width="1"
                           fill="currentColor" class="bi bi-send" viewBox="0 0 22 22">
                        <path
                          d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
<!--          <div class="pt-3">-->
<!--            <div class="card">-->
<!--              <div class="card-body">-->
<!--                <div class="row mb-2">-->
<!--                  <div class="col-md-10">-->
<!--                    <h3>-->
<!--                      2 of 3 steps are complete.-->
<!--                    </h3>-->
<!--                    <div class="display-flex">-->
<!--                      <div>-->
<!--                        <div class="progress progress-xs">-->
<!--                          <div class="progress-bar bg-primary" style="width: 75.0%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-md-2 d-flex content-justify-end">-->
<!--                    <a href="#" class="btn btn" style="background-color: #0f172a;color:white">-->
<!--                      Skip-->
<!--                    </a>-->
<!--                  </div>-->
<!--                </div>-->

<!--                <div class="card bg-light">-->
<!--                  <div class="card-body">-->
<!--                    <div class="row">-->
<!--                      <div class="col-md-9">-->
<!--                        <h3>-->
<!--                          Update your degree-->
<!--                        </h3>-->
<!--                      </div>-->
<!--                      <div class="col-md-3 py-2">-->
<!--                        <a href="#" class="btn btn-outline-info w-100">-->
<!--                          Update-->
<!--                        </a>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--          pie chart-->
<!--          <div class="pt-3">-->
<!--            <div class="card">-->
<!--              <div class="card-body">-->
<!--                <h2 class="mb-3">StudentProfileController Completion</h2>-->
<!--                <div>-->
<!--                  <div class="circle_box">-->
<!--                    <div>-->
<!--                      <svg id="svg-icon-pie-chart">-->
<!--                        <circle id="circle" cx="100" cy="100" r="95"/>-->
<!--                        <circle id="circle" cx="100" cy="100" r="95"/>-->
<!--                      </svg>-->
<!--                      <span style="color: black">75%</span>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
          <div class="pt-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h2>
                      Print your CV ?
                    </h2>
                  </div>
                  <div class="col-md-6">
                    <NuxtLink to="/user/student/cv-print" style=""  target="_blank" class="btn btn-outline-primary flex">
                      Go to CV
                    </NuxtLink>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <h2>
                      Education
                    </h2>
                  </div>
                  <div class="col-md-3 d-flex justify-content-end">
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-educations" style="color: black">
                      <li-icon type="add" size="medium" role="img" aria-label="Add new skills">
                        <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                             width="24" height="24" focusable="false">
                          <path d="M21 13h-8v8h-2v-8H3v-2h8V3h2v8h8z"></path>
                        </svg>
                      </li-icon>
                    </a>
                  </div>
                </div>
                  <div class="card bg-light mt-2">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                          <a class="">
                            <img src="../../../components/images/company/nsbm.png" alt="" id=""
                                 class="rounded-circle ember-view" width="70" height="70">
                          </a>
                        </div>
                        <div class="col-md-6 mt-2">
                          <h3>
                            HND in Software Engineering
                          </h3>
                          <p class="subheader">
                            NSBM
                          </p>
                          <p class="subheader">
                            2019
                          </p>
                        </div>
                        <div class="col-md-3 mt-3 text-end">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7c.412 .41 .97 .64 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1c0 .58 .23 1.138 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                          </svg>
                          <a href="" style="color: black">
                            <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                                 width="24" height="24" focusable="false">
                              <path
                                d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card bg-light mt-2">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                          <a class="">
                            <img src="../../../components/images/company/vta.png" alt="" id=""
                                 class="rounded-circle ember-view" width="70" height="70">
                          </a>
                        </div>
                        <div class="col-md-6 mt-2">
                          <h3>
                            Diploma in ICT
                          </h3>
                          <p class="subheader">
                            VTA - Narahenpita
                          </p>
                          <p class="subheader">
                            2018
                          </p>
                        </div>
                        <div class="col-md-3  mt-3 text-end">
                          <a href="" style="color: black">
                            <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                                 width="24" height="24" focusable="false">
                              <path
                                d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="pt-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <h2>Work Experience</h2>
                  </div>
                  <div class="col-md-3 d-flex justify-content-end">
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-work-experience" style="color: black">
                      <li-icon type="add" size="medium" role="img" aria-label="Add new skills">
                        <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                             width="24" height="24" focusable="false">
                          <path d="M21 13h-8v8h-2v-8H3v-2h8V3h2v8h8z"></path>
                        </svg>
                      </li-icon>
                    </a>
                    <!--                    <a href="">-->
                    <!--                      <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"-->
                    <!--                           width="24" height="24" focusable="false">-->
                    <!--                        <path-->
                    <!--                          d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>-->
                    <!--                      </svg>-->
                    <!--                    </a>-->
                  </div>
                </div>
                <div class="mt-2">
                  <div class="card bg-light">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                          <a class="">
                            <img src="../../../components/images/company/freelancer.jpg" alt="" id=""
                                 class="rounded-circle ember-view" width="70" height="70">
                          </a>
                        </div>
                        <div class="col-md-6 mt-2">
                          <h3>
                            Freelancer SE
                          </h3>
                          <p class="subheader">
                            Freelance
                          </p>
                          <p class="subheader">
                            2021
                          </p>
                        </div>
                        <div class="col-md-3 mt-3  text-end">
                          <a href="" style="color: black">
                            <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                                 width="24" height="24" focusable="false">
                              <path
                                d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-2">
                  <div class="card bg-light">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                          <a class="">
                            <img src="../../../components/images/company/10qbit.png" alt="" id=""
                                 class="rounded-circle ember-view" width="70" height="70">
                          </a>
                        </div>
                        <div class="col-md-6 mt-2">
                          <h3>
                            Intern SE
                          </h3>
                          <p class="subheader">
                            10Qbit
                          </p>
                          <p class="subheader">
                            2020
                          </p>
                        </div>
                        <div class="col-md-3 mt-3  text-end">
                          <a href="" style="color: black">
                            <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                                 width="24" height="24" focusable="false">
                              <path
                                d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="pt-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <h2>Skills</h2>
                  </div>
                  <div class="col-md-3 d-flex justify-content-end">
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-skills" style="color: black">
                      <li-icon type="add" size="medium" role="img" aria-label="Add new skills">
                        <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                             width="24" height="24" focusable="false">
                          <path d="M21 13h-8v8h-2v-8H3v-2h8V3h2v8h8z"></path>
                        </svg>
                      </li-icon>
                    </a>
                    <a href="" style="color: black">
                      <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                           width="24" height="24" focusable="false">
                        <path
                          d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <ul style="list-style-type:none;">
                    <li>
                      <h4>PHP</h4>
                    </li>
                    <li>
                      <h4>Vus.js</h4>
                    </li>
                    <li>
                      <h4>Java</h4>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="pt-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <h2>Achievements</h2>
                  </div>
                  <div class="col-md-3 d-flex justify-content-end">
                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-achievement" style="color: black">
                      <li-icon type="add" size="medium" role="img" aria-label="Add new achievemnts">
                        <svg viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match"
                             width="24" height="24" focusable="false">
                          <path d="M21 13h-8v8h-2v-8H3v-2h8V3h2v8h8z"></path>
                        </svg>
                      </li-icon>
                    </a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-vcenter">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Achievements</th>
                      <th class="w-1">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td class="text-muted">
                        test data
                      </td>
                      <td>
                        <a href="#">Edit</a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--    start skills popup form-->
    <div class="modal modal-blur fade" id="modal-skills" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Skills</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div>
                  <label class="form-label">Add Skills</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-outline-secondary link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              Save
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--    end skills popup form-->
    <!--    start work experience popup form-->
    <div class="modal modal-blur fade" id="modal-work-experience" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Work Experience</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div>
<!--                  <label class="form-label">Add Work Experience</label>-->
                  <div class="">
                    <label class="form-label">Company name</label>
                    <input type="text" class="form-control" placeholder="Enter Company name">
                  </div>
                  <div class="mt-3">
                    <label class="form-label">Position</label>
                    <input type="text" class="form-control" placeholder="Enter Position">
                  </div>
                  <div class="mt-3">
                    <label class="form-label">Start date</label>
                    <div class="row g-2">
                      <div class="col-5">
                        <select name="user[month]" class="form-select">
                          <option value="">Month</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option selected="selected" value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                      </div>
                      <div class="col-3">
                        <select name="user[day]" class="form-select">
                          <option value="">Day</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20" selected="">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                      </div>
                      <div class="col-4">
                        <select name="user[year]" class="form-select">
                          <option value="">Year</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989" selected="">2016</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mt-3">
                    <label class="form-label">End date</label>
                    <div class="row g-2">
                      <div class="col-5">
                        <select name="user[month]" class="form-select">
                          <option value="">Month</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option selected="selected" value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                      </div>
                      <div class="col-3">
                        <select name="user[day]" class="form-select">
                          <option value="">Day</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20" selected="">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                      </div>
                      <div class="col-4">
                        <select name="user[year]" class="form-select">
                          <option value="">Year</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989" selected="">2017</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mt-3">
                    <label class="form-label">Description</label>
                    <textarea type="" class="form-control" placeholder="Enter Your Job Description">
            </textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-outline-secondary link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              Save
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--    end work experience popup form-->
    <!--    start educations popup form-->
    <div class="modal modal-blur fade" id="modal-educations" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Education</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div>
                  <div class="">
                    <label class="form-label">Institute Name</label>
                    <input type="text" class="form-control" placeholder="Enter Institute Name">
                  </div>
                  <div class="mt-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" class="form-control" placeholder="Enter Course">
                  </div>
                  <div class="mt-3">
                    <label class="form-label">Address</label>
                    <textarea type="text" class="form-control" placeholder="Enter Course">
                    </textarea>
                  </div>
                  <div class="mt-3">
                    <label class="form-label">Add proof Document</label>
                    <input type="file" class="form-control">
                  </div>
                  <div class="mt-3">
                    <label class="form-label">Student Year</label>
                    <div class="col-2">
                      <select name="user[year]" class="form-select">
                        <option value="">Year</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="1989" selected="">2003</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-outline-secondary link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              Save
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--    end educations popup form-->
    <!--    start achievement popup form-->
    <div class="modal modal-blur fade" id="modal-achievement" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Achievements</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div>
                  <label class="form-label">Add Achievement</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-outline-secondary link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              Save
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--    end achievement popup form-->
    <!--    start edit profile details popup form-->
    <div class="modal modal-blur fade" id="modal-edit-profile" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Profile Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="mt-3">
                  <label class="form-label">Full name</label>
                  <input type="text" class="form-control" placeholder="Enter Full Name">
                </div>
                <div class="mt-3">
                  <div class="form-label">Profile Picture</div>
                  <input type="file" class="form-control">
                </div>
                <div class="mt-3">
                  <label class="form-label">Date of birth</label>
                  <div class="row g-2">
                    <div class="col-5">
                      <select name="user[month]" class="form-select">
                        <option value="">Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option selected="selected" value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <select name="user[day]" class="form-select">
                        <option value="">Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20" selected="">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <select name="user[year]" class="form-select">
                        <option value="">Year</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989" selected="">1989</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <label class="form-label">Phone Number</label>
                  <input type="tel" class="form-control" placeholder="Enter Phone Number">
                </div>
                <div class="mt-3">
                  <label class="form-label">Address</label>
                  <textarea type="" class="form-control" placeholder="Enter Address">
                </textarea>
                </div>
                <div class="mt-3">
                  <label class="form-label">Description</label>
                  <textarea type="" class="form-control" placeholder="Enter Your Description">
            </textarea>
                </div>
                <div class="mt-3">
                  <label class="form-label">Add Links</label>
                  <div class="row">
                    <div class="col-md-7">
                <input type="text" class="form-control" placeholder="Enter Links">
                    </div>
                    <div class="col-md-4">
                      <button type="button" class="btn btn-primary"> + </button>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table table-vcenter">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Links</th>
                            <th class="w-1">Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>1</td>
                            <td class="text-muted">
                              github
                            </td>
                            <td>
                              <a href="#">Edit</a>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-outline-secondary link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              Save
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--    end edit profile details popup form-->
  </div>
</template>

<script>
export default {
  name: "index",
  layout: "dashboard-user",




}
</script>

<style scoped>
.profile-picture{
  border-radius: 50%;
  height: 150px;
  width: 150px;
  margin-top: -75px;
}
*,*:after,*:before{
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
}
body{
  font-family: arial;
  font-size: 16px;
  margin: 0;
  background: #122325;
  display: flex;
  align-items: center;
  justify-content: space-around;
  height: 100vh;
}

#svg-icon-pie-chart{
  width: 200px;
  height: 200px;

  transform: rotate(-90deg);
  overflow: initial;
}

#circle{
  stroke-width:20px;
  fill:none;
}
#circle:nth-child(1){ stroke: #b3b7bd }
#circle:nth-child(2){
  stroke: #1a91da;
  position: relative;
  z-index: 1;
}
.circle_box:nth-child(1) circle:nth-child(2){
  stroke-dashoffset:calc(100 * 6);
  stroke-dasharray:calc(100 * 6);
  stroke-dashoffset:calc((100 * 6) - ((100 * 6) * 75) / 100);
  stroke-position: inside;
}
/*.circle_box:nth-child(2) circle:nth-child(2){*/
/*  stroke-dashoffset:calc(100 * 6);*/
/*  stroke-dasharray:calc(100 * 6);*/
/*  stroke-dashoffset:calc((100 * 6) - ((100 * 6) * 60) / 100);*/
/*  stroke: #0f0;*/
/*}*/
/*.circle_box:nth-child(3) circle:nth-child(2){*/
/*  stroke-dashoffset:calc(100 * 6);*/
/*  stroke-dasharray:calc(100 * 6);*/
/*  stroke-dashoffset:calc((100 * 6) - ((100 * 6) * 50) / 100);*/
/*  stroke: #00f;*/
/*}*/
.circle_box{
  font-size: 36px;
  color: #fff;
  text-align: center;
}
.circle_box div{
  position: relative;
}
.circle_box span{
  position: absolute;
  left: 50%;
  top:50%;
  transform: translate(-50%,-50%);
  font-size: 40px;
}

</style>

