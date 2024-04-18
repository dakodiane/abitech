@extends('layouts.app')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
            
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 mb-4 d-flex align-items-center justify-content-between flex-wrap">
                            <h6>Liste des réalisations de Abitech Solution</h6>
                          
                        </div>
                        <div class="card-body px-2 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nom
                                        </th>
                                    
                                        <th class="text-secondary opacity-7">
                                            Accéder
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                               
                                            <tr class="px-2">
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">Site Abitech</p>
                                                    </div>
                                                </td>
                                              
                                                <td>
                                                    <div class="d-flex align-items-center flex-wrap ">
                                                        <a class="btn p-4 d-flex align-items-center me-1 " href="https://www.abitech-solution.tech/"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Voir">
                                                            <i class="fa fa-eye text-success cursor-pointer"
                                                               role="button"></i>
                                                        </a>
                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="px-2">
                                                <td>
                                                    <div>
                                                        <p class="text-xs font-weight-bold mb-0">Site Nous</p>
                                                    </div>
                                                </td>
                                              
                                                <td>
                                                    <div class="d-flex align-items-center flex-wrap ">
                                                        <a class="btn p-4 d-flex align-items-center me-1 " href="https://www.nous-meet.com/"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Voir">
                                                            <i class="fa fa-eye text-success cursor-pointer"
                                                               role="button"></i>
                                                        </a>
                                        
                                                    </div>
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
    </main>

