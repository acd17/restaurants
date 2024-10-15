let goTopButton = document.getElementById("goTopButton");
            
window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;

  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}





document.addEventListener("DOMContentLoaded", function () {
  const button1 = document.getElementById("button1");
  const button2 = document.getElementById("button2");
  const button3 = document.getElementById("button3");
  const button4 = document.getElementById("button4");
  const button5 = document.getElementById("button5");
  const button6 = document.getElementById("button6");
  const button7 = document.getElementById("button7");
  const button8 = document.getElementById("button8");
  const button9 = document.getElementById("button9");
  const button10 = document.getElementById("button10");
  const button11 = document.getElementById("button11");
  const button12 = document.getElementById("button12");
  const button13 = document.getElementById("button13");
  const button14 = document.getElementById("button14");
  const button15 = document.getElementById("button15");
  const button16 = document.getElementById("button16");
  const button17 = document.getElementById("button17");
  const button18 = document.getElementById("button18");
  const button19 = document.getElementById("button19");
  const button20 = document.getElementById("button20");
  const button21 = document.getElementById("button21");
  const button22 = document.getElementById("button22");
  const button23 = document.getElementById("button23");
  const button24 = document.getElementById("button24");

  const invoice = document.getElementById("Invoice");
  const hargaTotal = document.getElementById("HargaTotal"); 
  const keranjangButton = document.getElementById("Keranjang");

  let hargaTotalValue = 0;
  const items = [];

  button1.addEventListener("click", function () {
      tambahItem("CHASU ORIGINAL RAMEN", 45000);
  });

  button2.addEventListener("click", function () {
      tambahItem("CHASU CURRY RAMEN", 55000);
  });

  button3.addEventListener("click", function () {
      tambahItem("CHASU MISO RAMEN", 55000);
  });

  button4.addEventListener("click", function () {
    tambahItem("CHASU SPICY RAMEN", 60000);
  });

  button5.addEventListener("click", function () {
    tambahItem("KATSU ORIGINAL RAMEN", 45000);
  });

  button6.addEventListener("click", function () {
    tambahItem("KATSU CURRY RAMEN", 50000);
  });

  button7.addEventListener("click", function () {
    tambahItem("KATSU MISO RAMEN", 55000);
  });

  button8.addEventListener("click", function () {
    tambahItem("KATSU SPICY RAMEN", 55000);
  });

  button9.addEventListener("click", function () {
    tambahItem("NIKU RICE BOWL", 60000);
  });

  button10.addEventListener("click", function () {
    tambahItem("EBI FURAI RICE BOWL", 55000);
  });

  button11.addEventListener("click", function () {
    tambahItem("KARAGE RICE BOWL", 55000);
  });

  button12.addEventListener("click", function () {
    tambahItem("BEEF RICE BOWL", 65000);
  });

  button13.addEventListener("click", function () {
    tambahItem("GYOZA", 55000);
  });

  button14.addEventListener("click", function () {
    tambahItem("KARAGE", 40000);
  });

  button15.addEventListener("click", function () {
    tambahItem("CHICKEN KATSU", 35000);
  });

  button16.addEventListener("click", function () {
    tambahItem("EBI FRY", 45000);
  });

  button17.addEventListener("click", function () {
    tambahItem("NIKU MILK PUDDING", 25000);
  });

  button18.addEventListener("click", function () {
    tambahItem("NIKU DANGO", 20000);
  });

  button19.addEventListener("click", function () {
    tambahItem("VANILLA ICE CREAM", 25000);
  });

  button20.addEventListener("click", function () {
    tambahItem("NIKU TAIYAKI", 25000);
  });

  button21.addEventListener("click", function () {
    tambahItem("OCHA", 20000);
  });

  button22.addEventListener("click", function () {
    tambahItem("MINERAL WATER", 15000);
  });

  button23.addEventListener("click", function () {
    tambahItem("LEMON TEA", 25000);
  });

  button24.addEventListener("click", function () {
    tambahItem("LYCHEE TEA", 30000);
  });


  function tambahItem(nama, harga) {
    items.push({ nama, harga });
    hargaTotalValue += harga;
    updateInvoice();
}

  function updateInvoice() {
      invoice.innerHTML = ""; 
      const itemContainer = document.createElement("div");
      itemContainer.id = "itemContainer";

      const namaItem = document.createElement("div");
      namaItem.textContent = "Nama Item";
      namaItem.id = "namaItem";
      itemContainer.appendChild(namaItem);

      const hargaItem = document.createElement("div");
      hargaItem.textContent = "Harga Item";
      hargaItem.id = "hargaItem";
      itemContainer.appendChild(hargaItem);

      const exitBtn = document.createElement("div");
      exitBtn.id = "exitBtn"; 
      const exitButton = document.createElement("button");
      exitButton.textContent = "X";
      exitButton.id = "exitButton";
      exitBtn.appendChild(exitButton);

      invoice.appendChild(exitBtn);
      invoice.appendChild(itemContainer);

      let isInvoiceVisible = true;

      exitButton.addEventListener("click", function(){
        if (isInvoiceVisible){
          invoice.style.display = "none";
        } else {
          invoice.style.display = "block";
        }

        isInvoiceVisible = !isInvoiceVisible;
      });

      items.forEach((item) => {
          const itemElement = document.createElement("div");
          itemElement.id = "itemElement";

          const nama = document.createElement("div");
          nama.textContent = `${item.nama}`;
          nama.id = "nama";
          itemElement.appendChild(nama);

          const harga = document.createElement("div");
          harga.textContent = `Rp ${item.harga}`;
          harga.id = "harga";
          itemElement.appendChild(harga);

          invoice.appendChild(itemElement);
      });

      const itemTotalHarga = document.createElement("div");
      itemTotalHarga.id = "itemTotalHarga";

      const TotalHarga = document.createElement("div");
      TotalHarga.textContent = "Total Harga";
      TotalHarga.id = "TotalHarga";
      itemTotalHarga.appendChild(TotalHarga);

      const total = document.createElement("div");
      total.textContent = `Rp ${hargaTotalValue}`;
      total.id = "total";
      itemTotalHarga.appendChild(total);

      invoice.appendChild(itemTotalHarga);

      hargaTotal.textContent = `Rp ${hargaTotalValue}`;
  }

  keranjangButton.addEventListener("click", function () {
    invoice.style.display = "block";
    document.body.style.backdropFilter = "blur(10px)";
  });

});