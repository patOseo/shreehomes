<!-- Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="h1 modal-title fs-5" id="registerModalLabel">Register</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if(get_field('registration_button') == 1): ?>
          <?php gravity_form( 2, false, false, false, '', true ); ?>
        <?php else: ?>
          <p>Registration is not currently available. Please contact us for more information.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>