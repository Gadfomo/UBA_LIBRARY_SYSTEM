document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 0;
    const formSteps = document.querySelectorAll(".form-step");
    const nextBtn = document.getElementById("next-btn");
    const prevBtn = document.getElementById("prev-btn");
    const form = document.getElementById("multi-step-form");

    function showStep(step) {
        formSteps.forEach((stepDiv, index) => {
            stepDiv.style.display = index === step ? "block" : "none";
        });

        prevBtn.disabled = step === 0;
        nextBtn.style.display = step === formSteps.length - 1 ? "none" : "inline-block"; // Hide "Next" on last step
    }

    nextBtn.addEventListener("click", function () {
        if (currentStep < formSteps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    });

    prevBtn.addEventListener("click", function () {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    });

    showStep(currentStep);
});
