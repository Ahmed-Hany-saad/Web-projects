
   <center>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class=" accordion-header">
     <center> <button class="accordion-button" style='background-color: #F25454; color: #fff' type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Daily Hadith
      </button></center>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong id="hadith"><?php echo $data['Hadiths']; ?></strong> 
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" style='background-color: #F25454; color: #fff' type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Daily verse
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong id="verse"><?php echo $data['QuranicVerses']; ?></strong>
      </div>
    </div>
  </div>
</div>
</center>
