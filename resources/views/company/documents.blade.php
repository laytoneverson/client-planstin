@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')

    <!-- body content -->
    <div class="col-md-9 emp-sec">
        <!-- see invoices -->
        <h3 class="side-bra-smi-h3 disply-inline">Signed Documents</h3>

        <ul class="invoice-list documents">
            <li>
                <a href="#" class="text-red">
                    <img class="pdf-img" src="/images/pdf.png" alt="invoice"> <br>
                    <span>Benefit agreement</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-red">
                    <img class="pdf-img" src="/images/pdf.png" alt="invoice"> <br>
                    <span>Service agreement</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-red">
                    <img class="pdf-img" src="/images/pdf.png" alt="invoice"> <br>
                    <span>Radom  agreement</span>
                </a>
            </li>
            <div class="clearfix"></div>

        </ul>

        <div class="clearfix"></div>

        <h3 class="side-bra-smi-h3 disply-inline">Documents to sign</h3>

        <ul class="invoice-list documents">
            <li>
                <a href="#" class="text-red">
                    <img class="pdf-img" src="/images/pdf.png" alt="invoice"> <br>
                    <span>Aditional service</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-red">
                    <img class="pdf-img" src="/images/pdf.png" alt="invoice"> <br>
                    <span>Service update</span>
                </a>
            </li>
            <div class="clearfix"></div>
        </ul>

        <h3 class="side-bra-smi-h3 disply-inline">Upload a Document</h3>
        <br>
        <input id="upload" type="file">
        <button id="upload_link" type="button" class="upload-doc footer-mgr"><i class="fa fa-upload" aria-hidden="true"></i><span>Upload</span></button>

    </div>
    </div>
    </div>
    <div class="push"></div>
    </div>
    <!-- body content  end-->


@endsection
