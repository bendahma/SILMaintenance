<form action="{{route('machines.saveNewMark')}}" method="POST" id="addMarkForm">
    @csrf
    <div class="modal fade" id="addNewMarkModel" tabindex="-1" role="dialog" aria-labelledby="MenthlyStatModelTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="">Données du paiement du CF et Trésorier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                      <label for="" class="font-weight-bold text-right">N° Engagement Paie</label>
                      <input type="number" name="NumEngagementPaie" id="" class="form-control">
                  </div>
                </div>      
              </div>                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulé</button>
            <button type="submit" class="btn btn-danger">OK</button>
            </div>
        </div>
        </div>
    </div>
  </form>
