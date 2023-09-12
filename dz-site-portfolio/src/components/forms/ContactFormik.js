import * as React from "react"
import { Formik, Form, Field, ErrorMessage } from "formik"

const validateFields = values => {
  const errors = {}

  if (!values.name) errors.name = "Name is required"

  if (!values.email) {
    errors.email = "Emaill is required"
  } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i.test(values.email)) {
    errors.email = "Invalid email address"
  }

  return errors
}

const handleSubmit = (values, { setSubmitting }) => {
  setTimeout(() => {
    alert(JSON.stringify(values, null, 2))
    setSubmitting(false)
  }, 400)
}

const ContactForm = () => {
  return (
    <>
      <Formik
        initialValues={{ name: "", email: "", message: "" }}
        validate={validateFields}
        onSubmit={handleSubmit}
      >
        {({ errors, isSubmitting }) => (
          <Form>
            <div className="relative mb-4">
              <div className="mb-1">Name</div>
              <Field
                name="name"
                className={`w-full leading-none px-4 py-3 border-2 rounded-lg focus:outline-none ${
                  errors.name ? "border-red-500" : "border-gray-200"
                }`}
              />
              <ErrorMessage
                className="text-sm text-red-500 pt-2"
                name="name"
                component="div"
              />
            </div>

            <div className="mb-4">
              <div className="mb-1">Email address</div>
              <Field
                name="email"
                className={`w-full leading-none px-4 py-3 border-2 rounded-lg focus:outline-none ${
                  errors.email ? "border-red-500" : "border-gray-200"
                }`}
              />
              <ErrorMessage
                className="text-sm text-red-500 pt-2"
                name="email"
                component="div"
              />
            </div>

            <div className="mb-4">
              <div className="mb-1">Message</div>
              <Field
                name="message"
                placeholder="Message"
                component="textarea"
                className="w-full h-32 leading-none px-4 py-3 border-2 border-gray-200 rounded-lg resize-none focus:outline-none"
              />
            </div>

            <div className="w-full text-center">
              <button
                type="submit"
                disabled={isSubmitting}
                className="text-lg text-white leading-none px-8 py-3 bg-digi-blue rounded-lg"
              >
                Send Now
              </button>
            </div>
          </Form>
        )}
      </Formik>
    </>
  )
}

export default ContactForm
