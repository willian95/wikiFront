<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p> Thanks!</p><br>
                    You just submitted your institution to be
                    part of wikiPBL! You should get a
                    confirmation email to finish the
                    registration, so all of your teachers and
                    associates can start creating wikiPBL
                    projects ASAP! Remember to check your spam
                    folder.
                </div>
            </div>
            <div class="modal-footers">
                <button type="button" class="btn " data-dismiss="modal">Close
                </button>
                <button type="button" class="btn " @click="resendEmail()">Resend confirmation</button>
            </div>
        </div>
    </div>
</div>