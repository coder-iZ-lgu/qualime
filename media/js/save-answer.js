
const inputsScraper = () => {
    const inputsObject = document.getElementsByTagName("input")
    const inputsArray = [...inputsObject]

    return inputsArray
}

const inputsValidator = (inputs) => {
    const validatedInputs = []

    inputs.forEach((input) => {
        const inputId = input.id

        if (inputId.includes("option")) {
            validatedInputs.push(input)
        }
    })

    return validatedInputs
}

const getStoredAnswersById = (taskId) => {
    const storedAnswersString = localStorage.getItem(taskId)
    const storedAnswersObject = JSON.parse(storedAnswersString)

    return storedAnswersObject || []
}

const getStoredAnswers = () => {
    const storedAnswers = []

    Object.entries(localStorage).forEach(([_, value]) => {
        const parsedValue = JSON.parse(value)

        storedAnswers.push(parsedValue)
    }, {})

    const flatedAnswers = storedAnswers.flat(1)

    return flatedAnswers
}

const storeAnswer = (taskId, answer) => {
    const parsedAnswer = JSON.stringify(answer)

    return localStorage.setItem(taskId, parsedAnswer)
}

const handleInputRadio = (e) => {
    const inputId = e.target.id
    const taskId = e.target.name
    const inputType = e.target.type
    const isChecked = e.target.checked

    const answer = { inputType, inputId, inputValue: isChecked }

    if (isChecked) {
        storeAnswer(taskId, answer)
    }
}

const handleInputCheckbox = (e) => {
    const inputId = e.target.id
    const taskId = e.target.name
    const inputType = e.target.type
    const isChecked = e.target.checked

    const answer = { inputId, inputType, inputValue: isChecked }

    if (isChecked) {
        const storedAnswers = getStoredAnswersById(taskId)
        storedAnswers.push(answer)

        storeAnswer(taskId, storedAnswers)
    }

    else {
        const storedAnswers = getStoredAnswersById(taskId)
        const filteredAnswers = storedAnswers.filter(answer => answer.inputId != inputId)
        console.log(storedAnswers)
        storeAnswer(taskId, filteredAnswers)
    }
}

const handleInputText = (e) => {
    const inputId = e.target.id
    const taskId = e.target.name
    const inputType = e.target.type
    const inputValue = e.target.value

    const answer = { inputId, inputType, inputValue }

    return storeAnswer(taskId, answer)
}

const addEventListenerForInputs = (inputs) => {
    const events = [{
        type: "radio",
        handle: handleInputRadio
    }, {
        type: "checkbox",
        handle: handleInputCheckbox
    }, {

        type: "text",
        handle: handleInputText
    }]

    inputs.forEach((input) => {
        const inputType = input.type

        events.forEach(({ type: eventType, handle }) => {
            if (inputType == eventType) {
                input.addEventListener("change", handle)
            }
        })
    })
}

const addStoredAnswersToInputs = () => {
    const storedAnswers = getStoredAnswers()

    storedAnswers.forEach(({ inputId, inputType, inputValue }) => {
        const input = document.querySelector(`#${inputId}`)

        if (inputType === "text") {
            input.value = inputValue
        } else {
            input.checked = inputValue
        }
    })


}

const main = () => {
    const inputs = inputsScraper()
    const validatedInputs = inputsValidator(inputs)

    addEventListenerForInputs(validatedInputs)
    addStoredAnswersToInputs()
}

document.addEventListener("DOMContentLoaded", main)