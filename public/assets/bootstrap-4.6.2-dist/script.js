document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 0;
    const formSteps = document.querySelectorAll(".form-step");
    const totalSteps = formSteps.length;
    const progressBar = document.getElementById("progress-bar");
    const stepNumber = document.getElementById("step-number");

    document.getElementById("next-btn").addEventListener("click", function () {
        if (currentStep < totalSteps - 1) {
            formSteps[currentStep].classList.remove("active");
            currentStep++;
            formSteps[currentStep].classList.add("active");
            updateStep();
        }
    });

    document.getElementById("prev-btn").addEventListener("click", function () {
        if (currentStep > 0) {
            formSteps[currentStep].classList.remove("active");
            currentStep--;
            formSteps[currentStep].classList.add("active");
            updateStep();
        }
    });

    function updateStep() {
        document.getElementById("prev-btn").disabled = currentStep === 0;
        document.getElementById("next-btn").textContent = currentStep === totalSteps - 1 ? "Submit" : "Next";
        stepNumber.textContent = currentStep + 1;
        progressBar.style.width = `${((currentStep + 1) / totalSteps) * 100}%`;

        saveFormData();
    }

    function saveFormData() {
        const inputs = document.querySelectorAll("input");
        inputs.forEach(input => localStorage.setItem(input.id, input.value));
    }

    function loadFormData() {
        const inputs = document.querySelectorAll("input");
        inputs.forEach(input => {
            const savedValue = localStorage.getItem(input.id);
            if (savedValue) input.value = savedValue;
        });
    }

    loadFormData();
});
